```php
function processData(array $data): array
{
  $result = [];
  foreach ($data as $item) {
    if (is_array($item)) {
      $result = array_merge($result, processData($item)); // Recursive call for nested arrays
    } elseif (is_string($item) && strlen($item) > 0) {
      $result[] = $item;
    } else {
      // Handle non-string or empty string elements (Optional)
      // Consider logging the error or throwing an exception
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
print_r($output); // Output will not include the empty string
```