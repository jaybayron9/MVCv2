const mysql = require('mysql');
const dotenv = require('dotenv');
dotenv.config();

class DBConn {
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
                if (error) { console.log(error); }
                console.log('Connected to the database');
            });
        } catch (error) { 
            console.log(error);
        }
    }

    closeConnection() {
        this.connection.end((error) => {
            if (error) {
                console.error('Error closing the connection:', error);
            } else {
                console.log('Connection closed');
            }
        });
    }
}

module.exports = DBConn;
