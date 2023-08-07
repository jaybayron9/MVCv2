const express = require('express');
const router = express.Router(); 
const auth = require('../controllers/accounts_controller');

router.post('/register', (req, res) => {
    const {username, password} = req.body; 
    auth.registerUser(username, password)

    res.send({
        username,
        password,
    });
});

module.exports = router;