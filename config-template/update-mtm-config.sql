USE Matomo;

update  matomo_plugin_setting
set     setting_value = 'https://kck.#YOUR_DOMAIN/auth/realms/pkc-realm/protocol/openid-connect/auth'
where   plugin_name = 'LoginOIDC'
        and setting_name = 'authorizeUrl';

update  matomo_plugin_setting
set     setting_value = 'https://kck.#YOUR_DOMAIN/auth/realms/pkc-realm/protocol/openid-connect/token'
where   plugin_name = 'LoginOIDC'
        and setting_name = 'tokenUrl';

update  matomo_plugin_setting
set     setting_value = 'https://kck.#YOUR_DOMAIN/auth/realms/pkc-realm/protocol/openid-connect/userinfo'
where   plugin_name = 'LoginOIDC'
        and setting_name = 'userinfoUrl';

update  matomo_plugin_setting
set     setting_value = 'https://kck.#YOUR_DOMAIN/auth/realms/pkc-realm/protocol/openid-connect/logout?redirect_uri=https://mtm.#YOUR_DOMAIN'
where   plugin_name = 'LoginOIDC'
        and setting_name = 'endSessionUrl';
