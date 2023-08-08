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

serv.listen(process.env.PORT || 3000, () => {
    console.log(`Server running...`);
});


// HOST=bpcdi8hldlj1g5awf0ub-mysql.services.clever-cloud.com
// DATABASE=bpcdi8hldlj1g5awf0ub
// PASSWORD=aoz5qVGgSEOkfqMS5uJN
// CYCLIC_APP_ID=outrageous-pink-flannel-nightgown
// CYCLIC_URL=https://outrageous-pink-flannel-nightgown.cyclic.app
// DB_PORT=3306