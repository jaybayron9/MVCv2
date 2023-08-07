const DBConn = require('./dbServices');

class Authorize extends DBConn {
    constructor() {
        super(); 
    }

    async registerUser(username, password) {
        try {
            const newUser = await new Promise((resolve, reject) => { 
                const query = `INSERT INTO accountes SET ?`;
                DBConn.query(query, {email: username, password: password}, (err, result) => {
                    if (err) reject(new Error(err.message));
                    resolve(result);
                })
            })
            console.log(newUser);
        } catch (error) {
            console.log(err)
        }
    }
}

module.exports = Authorize;