// Adding a filter to modify the configuration
bcMarketo.eventManager.addFilter('bcMarketo_config', function(config) {
    // Modify the config as needed
    config.ctaButtonText = 'Button Text Modified'; // Example modification
 
    return config; // Return the modified config
});


// Example of using the global bcMarketo object
// bcMarketo.eventManager.addAction('someAction', () => {
//     console.log('Some action executed!');
// });

// bcMarketo.eventManager.doAction('someAction'); // Logs: Some action executed!

// Add an action
// EventManager.addAction('myCustomAction', function (data) {
// 	console.log('Action executed with data:', data);
// });

// Trigger the action
// EventManager.doAction('myCustomAction', { key: 'value' }); // Logs: Action executed with data: { key: 'value' }

// Adding an action
// EventManager.addAction('init', function () {
// 	console.log('Init action triggered');
// });

// Triggering the action later
// EventManager.doAction('init'); // Logs: Init action triggered


// Add a filter
// MyEventManager.addFilter('myCustomFilter', function(value) {
//     return value.toUpperCase(); // Example filter that converts the string to uppercase
// });

// Apply the filter
// const originalValue = 'hello world';
// const filteredValue = MyEventManager.doFilter('myCustomFilter', originalValue);

// console.log(filteredValue); // Logs: "HELLO WORLD"


// Adding a filter
// MyEventManager.addFilter('addPrefix', function(value) {
//     return 'Prefix_' + value;
// });

// Applying the filter
// const originalValue = 'Value';
// const filteredValue = MyEventManager.doFilter('addPrefix', originalValue);

// console.log(filteredValue); // Logs: "Prefix_Value"