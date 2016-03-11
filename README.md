# sjtu-mass-mail
A mass-mail tool for SJTU email account written in PHP.

# Installation
Firstly, clone the whole repository.
```
git clone https://github.com/JasonQSY/sjtu-mass-mail.git
```
Then, install the dependencies with `composer`
```
cd sjtu-mass-mail
composer install
```
If you have problem of `composer`, read the docs of it can help. It is a common tool for PHPers to install dependencies.

The installation is complete now.

# Usage

Firstly, you need modify the `.env`.
```
cp .env.default .env
vim .env
```
And enter your nickname, your sjtu mail and password.

Then, create two file `title.html` and `mail.html` just in this direction. Add you mail title and contents in it.

Finally, modify the `$addressArray` in the `sjtuMassMail.php` to the address you want to send.

I admit that the steps are very stupid.

Then you can send the mail.
```
php sjtuMassMail.PHP
```
I think it's helpful just because the speed is fast and it will remind you of feedback for every address. It is convenient.
