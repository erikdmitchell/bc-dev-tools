const MyEventManager = {
    events: {},

    // Method to add an action
    addAction(action, callback) {
        if (!this.events[action]) {
            this.events[action] = [];
        }
        this.events[action].push(callback);
    },

    // Method to execute actions
    doAction(action, ...args) {
        if (this.events[action]) {
            this.events[action].forEach(callback => {
                callback(...args);
            });
        }
    }
};

export default MyEventManager;