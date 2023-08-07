const express = require('express'); 
const path = require('path');
const dotenv = require('dotenv');
const cors = require('cors'); 

const serv = express();

dotenv.config();
serv.use(express.json());
serv.use(express.urlencoded({ extended: false }));
serv.use(cors());

serv.set('views', path.join(__dirname, 'views'));
serv.set('view engine', 'ejs');

serv.use('/assets', express.static('assets')); // Tailwind Styling

serv.use('/controller', require('./routes/controller_routes.js')); 
serv.use('/', require('./routes/view_routes')); 

serv.listen(process.env.PORT, () => {
    console.log(`Server running at port ${process.env.PORT}`);
});
