<?php
    require 'vendor/autoload.php';

    use Aws\SecretsManager\SecretsManagerClient; 
    use Aws\Exception\AwsException;

    $client = new SecretsManagerClient([
        'profile' => 'default',
        'version' => 'latest',
        'region' => 'ap-northeast-2',
    ]);
    
    $secretName = 'db-creds';
    
    try {
        $result = $client->getSecretValue([
            'SecretId' => $secretName,
        ]);
    
    } catch (AwsException $e) {
        $error = $e->getAwsErrorCode();
        if ($error == 'DecryptionFailureException') {
            // Secrets Manager can't decrypt the protected secret text using the provided AWS KMS key.
            // Handle the exception here, and/or rethrow as needed.
            throw $e;
        }
        if ($error == 'InternalServiceErrorException') {
            // An error occurred on the server side.
            // Handle the exception here, and/or rethrow as needed.
            throw $e;
        }
        if ($error == 'InvalidParameterException') {
            // You provided an invalid value for a parameter.
            // Handle the exception here, and/or rethrow as needed.
            throw $e;
        }
        if ($error == 'InvalidRequestException') {
            // You provided a parameter value that is not valid for the current state of the resource.
            // Handle the exception here, and/or rethrow as needed.
            throw $e;
        }
        if ($error == 'ResourceNotFoundException') {
            // We can't find the resource that you asked for.
            // Handle the exception here, and/or rethrow as needed.
            throw $e;
        }
    }:
    // Decrypts secret using the associated KMS CMK.
    // Depending on whether the secret is a string or binary, one of these fields will be populated.
    if (isset($result['SecretString'])) {
        $secret = $result['SecretString'];
    } else {
        $secret = base64_decode($result['SecretBinary']);
    }
    
    // Your code goes here; 
     