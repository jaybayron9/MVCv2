const mysql = require('mysql');
const dotenv = require('dotenv');
dotenv.config();

class Model {
    constructor() {
        try {
            this.connection = mysql.createConnection({
                host: process.env.HOST,
                user: process.env.USER,
                password: process.env.PASSWORD,
                database: process.env.DATABASE,
                port: process.env.DB_PORT
            });

            this.connection.connect((error) => {
                if (error) {
                    throw error;
                }
                console.log('Connected to the database');
            });
        } catch (error) {
            throw error;
        }
    }
    
    
}

module.exports = Model;
