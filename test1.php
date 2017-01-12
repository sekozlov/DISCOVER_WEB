<script> 
var storj = require('storj-lib');
var fs = require('fs');
// Set the bridge api URL
var api = 'https://api.storj.io';
// Create client for interacting with API

// API credentials
var user = {email: 'e305eb80-da28-4e7e-8669-47b267b48038_23668254682f41b0a77e573c17860dc0@heroku.storj.io', password: 'ir9tDe2cq9wf8IXaZEdWQGNZ7lyxX9qN9mcXv0Ie/VyHO6wvmBEGPs5+nfdPGW8F'};
var client = storj.BridgeClient(api, {basicAuth: user});

// Generate KeyPair
var keypair = storj.KeyPair();

// Add the keypair public key to the user account for authentication
client.addPublicKey(keypair.getPublicKey(), function(err) {
  if (err) {
    // Handle error on failure.
    return console.log('error', err.message);
  }
  // Save the private key for using to login later.
  // You should probably encrypt this
  fs.writeFileSync('./private.key', keypair.getPrivateKey());
});
client.getBuckets(function(err, buckets) {
  if (err) {
    // Handle error on failure.
    return console.log('error', err.message);
  }

  if (!buckets.length) {
    return console.log('warn', 'You have not created any buckets.');
  }

  // Log out info for each bucket
  buckets.forEach(function(bucket) {
    console.log(
      'info',
      'ID: %s, Name: %s, Storage: %s, Transfer: %s',
      [bucket.id, bucket.name, bucket.storage, bucket.transfer]
    );
  });
});</script>
