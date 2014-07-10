CelciusTechTranslatorBundle
=====================

TranslatorBundle is translator bundle used in CelciusTech's projects

## Installation

```
php composer.phar require celciustech/translator-bundle
```

Add this line in your app/config.yml
```
twig:
    form:
        resources:
            - 'CelciusTechTranslatorBundle:Form:fields.html.twig'
```

Create an Entity that extends Model/Language
```php
<?php

namespace Acme\HelloBundle\Entity;

// ...
use CelciusTech\TranslatorBundle\Model\Language as Base;

/**
 * Language
 *
 * @ORM\Table(name="language")
 * @ORM\Entity()
 */
class Language extends Base
{
    // ...
}
```
