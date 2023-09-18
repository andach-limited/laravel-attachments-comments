# Laravel Attachments and Comments by Andach

[![Latest Version on Packagist](https://img.shields.io/packagist/v/andach/laravel-attachments-comments.svg?style=flat-square)](https://packagist.org/packages/andach/laravel-attachments-comments)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/andach/laravel-attachments-comments/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/andach/laravel-attachments-comments/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/andach/laravel-attachments-comments/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/andach/laravel-attachments-comments/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/andach/laravel-attachments-comments.svg?style=flat-square)](https://packagist.org/packages/andach/laravel-attachments-comments)

This is a Laravel package for adding Attachments and Comments to any model.

## Installation

You can install the package via composer:

```bash
composer require andach-limited/laravel-attachments-comments
```

You can publish the config and migrations with:

```bash
php artisan attachments-comments:install
```

## Config

TODO

## Usage

### Using a Trait

To add the relations to a model, simply add the `MorphToAttachmentsAndComments` trait to the model. If only one is needed, then just use `MorphToAttachments` or `MorphToComments` by themselves.

```
class MyModel extends Model
{
    use MorphToAttachmentsAndComments;

    // ...
}
```

### Adding Attachments and/or Comments

To actually add an attachment or a comment, you can use the `addAttachmentAndComment()`. This accepts a single string and an optional UploadedFile.

```
<form action="{{ route('my-model.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="text" name="comment" />
    <input type="file" name="attachment" />

    <button type="submit">Submit</button>
</form>
```

And in the relevant controller method...

```
public function store(Request $request)
{
    $model = MyModel::create();

    $model->addAttachmentAndComment($request->comment, $request->attachment);

    return redirect()->route('my-model.show', $model);
}
```

If handed an empty string or null attachment, the system will not create an attachment or comment silently.

### Retrieving Attachments and Comments

The relations are all handled by the traits, so you can just call:

``` 
$model = new MyModel();

foreach ($model->attachments as $attachment)
{
    // ...
}

foreach ($model->comments as $comment)
{
    // ...
}
```

### Displaying Comments and Attachments

```

```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
