```php
function processData(array $data): array
{
  $result = [];
  foreach ($data as $item) {
    if (is_array($item)) {
      $result = array_merge($result, processData($item)); // Recursive call for nested arrays
    } elseif (is_string($item)) {
      $result[] = $item; // Include empty strings
    } else {
      // Handle non-string elements (Optional)
      error_log('Warning: Non-string element encountered: ' . var_export($item, true)); // Log the error
    }
  }
  return $result;
}

$input = [
  'apple',
  ['banana', 'cherry'],
  'date',
  ['fig', ['grape', 'kiwi']],
  ''
];

$output = processData($input);
print_r($output); // Output now includes the empty string
```