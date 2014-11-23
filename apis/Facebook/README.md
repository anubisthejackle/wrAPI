# Facebook wrAPI

This README details how to use the Facebook extensions of the wrAPI framework.

## Generating an Auth Token

The most important thing you're going to want to do is get an access token. This is because 99% of the things you want to use the API for require it, as does the ->connect() method.

Facebook uses a number of different types of Access Tokens. If you notice one is missing, don't hesitate to add it and submit a ***pull request***

### Regular Access Token

This is your normal App Access Token. It's used by the app to make secured calls.

From the [Facebook Developer Docs](https://developers.facebook.com/docs/facebook-login/access-tokens):
```
GET /oauth/access_token?
     client_id={app-id}
    &client_secret={app-secret}
    &grant_type=client_credentials
```

This would translate to:
```
$app_id = 12345;
$app_secret = 'e587c9a2a4b1c059dd62faa67b76380a';
$fb = wrAPI::create('Facebook');
$access_token = $fb->get( '/oauth/access_token', array(
							'client_id' => $app_id,
							'client_secret' => $app_secret,
							'grant_type' => 'client_credentials'
						)
			);
```
