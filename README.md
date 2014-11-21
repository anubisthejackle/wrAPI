# wrAPI

A framework for wrapping all APIs.

## Where do we stand?

As you can see, there's not much here. wrAPI is an idea, a concept, which could become amazing. The idea is simple, but powerful. As the internet gets larger, the world relies on it more and more, and we rely on the ability to interact with the vast number of APIs that are out there. The thing is, each API has it's own idea of how it should be used, it has it's own way of working, and there is no standardized way of communicating with them.

Yet.

wrAPI hopes to create a standardized API format. You will be able to connect to any API that is in the wrAPI list, and use it with the same function calls.

So:

```
$fb = new wrAPI('facebook');
$fb->connect($api_key);
```

and

```
$twitter = new wrAPI('twitter');
$twitter->connect($api_key);
```

Would work the same way. You'd be able to call them the same way. Standardize the API calls in-code, and the sites can change their calls, because your code will be future-proofed.
