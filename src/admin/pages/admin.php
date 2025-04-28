<div class="wrap bc-settings">
    <h1>Boomi CMS Dev Tools</h1>

    <div class="bc-admin-wrap">
        <div class="bc-main-container">
            <div class="bc-admin-box">
                <div id="bc-notices" class="bc-notices"></div>

                <form class="bc-form" id="bc-dev-settings-form" name="bc-dev-settings-form" method="post" action="">
                    <?php wp_nonce_field( 'bc_save_dev_settings', 'bc_dev_settings_nonce' ); ?>

                    <div class="bc-container">
                        <h2>Settings</h2>

                        <div class="bc-row">
                            <label class="bc-toggle-switch" for="enable-dev-mode">
                                <input type="checkbox" name="bc_dev_settings[enable_dev_mode]" id="enable-dev-mode" value="1" <?php checked( 1, (int) get_option( '_bc_dev_settings_enable_dev_mode', 0 ) ); ?>>
                                <span class="slider round"></span>
                            </label>
                            Enable Dev Mode
                        </div>
                    </div>

                    <p class="submit">
                        <button type="submit" class="bc-button bc-btn-primary">Save Changes</button>
                    </p>

                    <input type="hidden" name="bc_dev_settings[submitted]" value="1">
                </form>
            </div>
        </div>
    </div>
</div>