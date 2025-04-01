# Developer

## bcMarketo Actions and Filters

### Adding a filter to modify the configuration

```
bcMarketo.addFilter('bcMarketo_config', function(config) {
    // Modify the config as needed
    config.ctaButtonText = 'Button Text Modified'; // Example modification
 
    return config; // Return the modified config
});
```

### Adding an action to tigger some code

```
bcMarketo.addAction('bcMarketo_formLoaded', function(form) {
    console.log('triggered bcMarketo_formLoaded');
});
```