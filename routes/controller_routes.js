const express = require('express');
const router = express.Router();
const AccountsController = require('../controllers/Accounts_controller');

const accountsController = new AccountsController();

router.post('/register', async (req, res) => {
    const { username, password } = req.body;

    try {
        await accountsController.registerUser(username, password);
        res.status(200).json({ message: 'User registered successfully.' });
    } catch (error) {
        res.status(500).json({ error: 'An error occurred while registering the user.' });
    }
});

module.exports = router;
