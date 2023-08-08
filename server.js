const express = require('express'); 
const path = require('path');
const dotenv = require('dotenv');  
const serv = express(); 
dotenv.config();

const cors = require('cors');
serv.use(cors());
serv.use(express.json()); 
serv.use(express.urlencoded({ extended : true }));

serv.set('views', path.join(__dirname, 'views'));
serv.set('view engine', 'ejs');

serv.use('/assets', express.static('assets'));
serv.use('/node_modules', express.static('node_modules'));

serv.use('/controller', require('./routes/controller_routes.js'));
serv.use('/', require('./routes/view_routes'));

const PORT = process.env.PORT || 5000;
serv.listen(PORT, () => {
    console.log(`Server running at port ${PORT}`);
});
