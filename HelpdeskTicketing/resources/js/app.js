import './bootstrap';
// Import required modules
// Import required modules
const express = require('express');
const { Pool } = require('pg');
const app = express();
const port = 3000;

// PostgreSQL connection configuration
const pool = new Pool({
    user: 'your_username',
    host: 'localhost',
    database: 'your_database',
    password: 'your_password',
    port: 5432,
});

// Endpoint to fetch ticket counts
app.get('/api/realtimeData', async (req, res) => {
    try {
        const client = await pool.connect();
        const result = await client.query('SELECT status, COUNT(*) AS count FROM tickets GROUP BY status');
        client.release();

        const ticketStatus = {
            pending: 0,
            approved: 0,
            completed: 0,
        };

        // Process the database result to update ticketStatus object
        result.rows.forEach(row => {
            if (row.status === 'pending') {
                ticketStatus.pending = parseInt(row.count);
            } else if (row.status === 'approved') {
                ticketStatus.approved = parseInt(row.count);
            } else if (row.status === 'completed') {
                ticketStatus.completed = parseInt(row.count);
            }
        });

        // Calculate summary data
        const summary = {
            totalTickets: ticketStatus.pending + ticketStatus.approved + ticketStatus.completed,
            pendingTickets: ticketStatus.pending,
            approvedTickets: ticketStatus.approved,
            completedTickets: ticketStatus.completed
        };

        // Send JSON response containing ticketStatus and summary
        res.json({ ticketStatus, summary });
    } catch (err) {
        console.error('Error fetching data from database:', err);
        res.status(500).json({ error: 'Internal server error' });
    }
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

