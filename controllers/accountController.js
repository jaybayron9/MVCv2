const DBConn = require('./DBConnection');

class accountController extends DBConn {
    constructor() {
        super(); 
    }

    async registerUser(username, password) {
        try {
            const newUser = await new Promise((resolve, reject) => {
                const query = `INSERT INTO accounts SET ?`;
                this.connection.query(query, { email: username, password: password }, (err, result) => {
                    if (err) reject(err);
                    resolve(result);
                });
                this.closeConnection();
            });
            console.log(newUser);
        } catch (error) {
            console.error(error);
        }
    }

    async LoginUser(username, password) {

    }

    async forgotPassword(email) {

    }

    async changePassword(email, newPassword, confirmPassword) {

    }
}

module.exports = accountController;