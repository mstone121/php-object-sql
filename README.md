# php-object-sql
An object-oriented approach to SQL generation in PHP

The goal of this project is to apply the principles of object-oriented programming without the strict requirements and lengthy setup of ORMs to the generation of SQL queries.

Before
```php
$query = "SELECT question.id, qr.id, qr.response_label
    FROM questions q
    LEFT JOIN question_responses qr ON qr.question_id = q.id";

if ($questionIds) {
    $query .= "WHERE q.id IN ('" . implode("','", $questionIds) . "')";
}

$query .= " ORDER BY q.id, qr.id";
```

After
```php
$query = new QString(
    new QSelect([
        'q.id',
        'qr.id',
        'qr.label'
    ]),
    new QFrom('questions'),
    new QJoinsCollection(
        new QJoinOn(
            'question_responses qr',
            'qr.question_id = q.id',
            'LEFT'
        )
    ),
    new QOrder(['q.id', 'qr.id'])
);

if ($questionIds) {
    $query->addComponent(
        new QWhere(
            new QAnd(
                new QIn('q.id', $questionIds)
            )
        )
    );
}
```

Please note that no checking is performed on strings passed to QComponents. This means you could potentially create a query like so:
```php
new QString(
    new QSelect([
        "1; TRUNCATE questions; SELECT *"
    ]),
    new QFrom('questions')
)
```
and it would delete everything in the `questions` table.
