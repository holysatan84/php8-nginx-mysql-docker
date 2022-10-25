# Learn PHP The Right Way

This is kind of an outline of my Learn PHP The Right Way series on YouTube. The series is split in three sections & 
all the videos are within the following [playlist](https://youtube.com/playlist?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-). Below is list of the videos with their appropriate section & lesson number.

The series is up-to-date with PHP version 8.1. I will try my best to keep this series up to date as the new PHP versions come out. Feel free to open a PR if you notice a typo or a mistake or let me know.

# Section 1 - Basic PHP

- [Lesson 1.3 - Constants & Variable Variables](https://youtu.be/6JtP8xk1U_k)
1) `define("CONSTNAME", "VALUE")` vs `const CONSTNAME = VALUE;`
2) **define vs const**: Both used to define constants. `_const_` creates at compile time `_define_` creates  at run
   time. Hence, `const` cannot be used in loops and control statements.
3) Magic constants `__FILE__`, `__DIR__`
4) Predefined constants `PHP_VERSION`, etc.
5) Variable Variable
```php
$foo = bar;

$$foo = 'baz';

echo $foo, $bar;
// bar baz
echo "$foo, $$foo";
// bar, baz
echo "$foo, ${$foo}";
// bar baz
```
---
- [Lesson 1.4 - Data Types & Casting](https://youtu.be/KH4MmQsCDuw)
### Data types
#### Scalar types
- bool, int, float, string

#### Compound types
- array, object, callable, iterable

#### Special types
- resource, null
- 
```php
gettype() # get type
```

### type hinting
Works when `strict_types`is not set.
```php
function sum(int $x, int $y) { #type hinting x & y 
    var_dump($x + $y)
}

sum (2, 4); 
sum (2, '4'); # o/p 6 as 4 is coerced to int
sum (2.5, 4); # o/p 6 as 2.5 is coerced to int with value 2

sum(array[3,5], 6); would # throw an error
```
### type casting
```php
$var = '200';
$a = (int) $var;
```
---

- [Lesson 1.5 - Boolean Data Type](https://youtu.be/1kO_g_ucYCQ)
- [Lesson 1.6 - Integer Data Type](https://youtu.be/rjEP_GUdg6o)
- [Lesson 1.7 - Float Data Type](https://youtu.be/d3c_OOD4Jzs)
- [Lesson 1.8 - String Data Type - Heredoc & Nowdoc Syntax](https://youtu.be/97LnEncGx2c)
- [Lesson 1.9 - Null Data Type](https://youtu.be/XspbsepnhQ4)
- [Lesson 1.10 - Arrays](https://youtu.be/C8ZFLq24g_A)
- [Lesson 1.11 - Expressions](https://youtu.be/bPntels5hw8)
---
- [Lesson 1.12 - Operators Part 1](https://youtu.be/t8U2FGjjqM8)
```php
# <= PHP 7.4 true as the string was transformed into int,
# which is 0 and then compared as  (0 == 0) which is true  
# > PHP 7.4 false as the int 0 was transformed into string '0'
# and then compared to hello ('0' == 'hello') which is FALSE  
var_dump(0 == 'hello');
```
---
- [Lesson 1.13 - Operators Part 2](https://youtu.be/gCVlQdbddXY)
- [Lesson 1.14 - Operator Precedence & Associativity](https://youtu.be/pmX_-x3LX-k)
---
- [Lesson 1.15 - Control Structures - If/Else](https://youtu.be/PUWrc6vzRMw)
```php
    if ($a = 1): echo "equal";
    elseif($a > 1): echo "greater than 1";
    else: echo "less than 1";
    endif;
```
---
- [Lesson 1.16 - Loops - Break & Continue](https://youtu.be/NhXvpHB_PMQ)
- [Lesson 1.17 - Switch Statement](https://youtu.be/egDgLO8kvtI)
---
- [Lesson 1.18 - Match Expression](https://youtu.be/jCUyvHUKSmE)

### diff between switch and match
- `switch` does a loose `(==)` comparison. In a `switch` if no condition is matched and the default is not specified 
then it would not throw an error. The  `default` case is not mandatory in a `switch` v/s `match` whereas if a condition 
is not met and is default is not specified it would  throw an error. 
```php
$paymentStatus = 1;
switch($paymentStatus) {
    case 1:
        echo 'Paid';
        break;
    case 2: case 3:
        echo 'Declined';
        break;
    default: # st
        echo 'Failed';
        break;
}

match($paymentStatus){
    1 => echo  'Paid';
    2, 3 => echo 'Declined';
    default => echo 'Failed';
}
```
---
- [Lesson 1.19 - Return, Declare & Tickable Statements](https://youtu.be/6cPc_SEfgSw)
---
- [Lesson 1.20 - Include & Require](https://youtu.be/pQLO6l5lp-Y)
```php
ob_start(); # turns on output buffering
ob_get_clean(); # Get current buffer contents and delete current output buffer
ob_flush(); # Flush (send) the output buffer
ob_clean(); # Clean (erase) the output buffer
```
---
- [Lesson 1.21 - Functions & Type Hinting](https://youtu.be/ba1rulfNhLk)
```php
declare(strict_types=1);

function foo(): ?int { return 1;} # allows return values as int or null 
function foo(): void { return null;} # throws an error
function foo(): int|float|array { return 1;} # union return types - allows multiple return types
function foo(): mixed { return 1;} # allows multiple return types(introduced in PHP8)
```
---
- [Lesson 1.22 - Function Parameters - Named Arguments - Variadic Functions & Unpacking](https://youtu.be/I9XkWyets9w)

```php
declare(strict_types=1); # to prevent type coercion

function foo(int $x, int $y) { return $x*$y; } #type hinting 
function foo(int $x, int|float $y) { return $x*$y; } #type hinting - union types
function foo(int $x, int|float $y = 1) { return $x*$y; } #default values
function foo(int $x = 3, int|float $y) { return $x*$y; } #throws errors

# variadic function
function foo(...$numbers) { return array_sum($numbers)}

# variadic fn with default params
function foo(int $x, ...$numbers) { return $x + array_sum($numbers)} 

# named arguments added in PHP8
function sum($x, $y) { return $x + $y; }
echo sum(x: 3, y: 5);
setcookie(name: 'test', httponly: true); # skipped the intermediate params to the function 
```
---
- [Lesson 1.23 - Variable Scopes & Static Variables](https://youtu.be/et1aVZWMvVE)
---
- [Lesson 1.24 - Variable, Anonymous, Callable, Closure & Arrow Functions](https://youtu.be/7_FOIxYLF-s)
```php
$x = 0; $y = 1; $z = 3;
# anon function
$sum = function (int|float ... $numbers) use ($x) { return $x + array_sum($numbers);};
echo $anon_result = $sum($x, $y);

#arrow function
$arrows_sum = fn(... $num) => array_sum($num);
echo $arrow_Result = $arrows_sum($x, $y, $z);

```
---
- [Lesson 1.25 - Work With Date, Time & Time Zones](https://youtu.be/Zf9MWSUKpVM)
- [Lesson 1.26 - Work With Arrays - Array Functions](https://youtu.be/E4FUeWa3WQk)
- [Lesson 1.27 - PHP.INI - Configuration File](https://youtu.be/LVEhccXXnOo)
- [Lesson 1.28 - Error Handling](https://youtu.be/rQntgj7yink)
- [Lesson 1.29 - Apache Configuration & Virtual Hosts](https://youtu.be/ytVPiYILz80)
- [Lesson 1.30 - Work With File System](https://youtu.be/p7F2GgVxHc0)
- [Lesson 1.31 - Mini Exercise Project](https://youtu.be/oXcX4ucj32M)
- [Lesson 1.32 - Mini Exercise Project Solution](https://youtu.be/MOsolLaVnsI)

# Section 2 - Intermediate PHP (OOP)

- [Lesson 2.0 - Intro to Object-Oriented PHP](https://youtu.be/1SujQeVK4MU)
- [Lesson 2.1 - Docker - Nginx - FPM](https://youtu.be/I_9-xWmkh28)
---
- [Lesson 2.2 - Classes & Objects](https://youtu.be/6FW72q5fIx8)
  - By default, if function modifier is not defined it is set to public
  - Also, when a property is not set for a class object it's value is `uninitialized`
  - Multiple methods for a function that apply business logic on a class object could be chained
    ```php
    $transactionAmtWithTaxAndDiscount = new Transaction(100, 'Transaction 1')
                                            ->addTax('8')
                                            ->applyDiscount('10')
                                            ->getAmount();
    ```
  - Std Class: Objects of std class can we created by creating an object of `stdClass()` or typecasting other types 
    to objects
   
    ```php
    #creating a new object of stdClass()
    $obj = new stdClass();
    $obj->a = 1;
    $obj->b = 2;
   
    #typecasting other types to object
    $arr = [1,2,3];
    $obj = (object) $arr;
    echo $arr->{0} . $arr->{1} . $arr->{2};
    
    var_dump((object) 1); # object(stdClass)[1] public 'scalar' => int 1
    ```
---

- [Lesson 2.3 - Constructor Property Promotion](https://youtu.be/T1PbFz-o6kw)\
  - Added as part of PHP8
  - Type-hinting callable with promotion is not allowed
  - Partly properties can be promoted
    ```php
    declare(strict_types=1);
    
    class Transaction
    {
        public function __construct(private float $amount, private string $description) {}
    }
    ```
  - Null safe operator prevents calls on null/undefined properties and function
  - It shorts circuits whenever a null is encountered and doesnt execute the functionality after it. Which could be 
    an issue
    ```php
    declare(strict_types=1);
    # null safe operator on a property  
    echo $transaction->customer?->profile?->id; 
    # null safe operator on a class function  
    echo $transaction->getCustomer()?->getProfile()?->id; 
    ```
---
- [Lesson 2.4 - Namespaces](https://youtu.be/Jni9c0-NjrY)
---
- [Lesson 2.5 - Composer - PSR - Autoloading](https://youtu.be/rqzYdHdyMH0)
  - Composer should ideally be loaded as a different instance in production
---
- [Lesson 2.6 - Class Constants](https://youtu.be/bEGNvUxYf2o)
---
- [Lesson 2.7 - Static Properties & Methods](https://youtu.be/6VVN-2SCx7Q)
  - Static properties are shared across objects of a particular class
  - Static elements can be accessed using `static`, `self` or `parent` keywords
  - Non-static properties invocation using static method would throw fatal error.
  - Non-static method invocation using static method would throw a deprecation prior to PHP8 and a fatal error after that.
  - use cases - singleton implementation, caching, counters
  - Static closures ensure that the `$this` object is not available in the closure, which may mistakenly update the 
    object 
    ```php
    <?php
    
    namespace App;
    
    class DB
    {
        public static ?DB $instance = null;
        private function __construct(public array $config){}
        
        public static function getInstance(array $config): DB
        {
            if (self::$instance === null) {
                self::$instance = new DB($config);
            }
            return self::$instance;
        }
    }
    
    ```
---
- [Lesson 2.8 - OOP Principles - Encapsulation & Abstraction](https://youtu.be/kA9BTNPFObo)
  - Do not create getter and setters on every property until needed
  - Keep internal functionality as private methods to prevent accidentally calling them
  - Reflection class can override restricted access to properties and function
    ```php
        class Transaction {
            public function __construct(private int $amount) {}
        }
      
        $transaction = new Transaction(25);
        $reflectionProperty = new ReflectionPrperty(Transtation::class, 'amount');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($transaction, 125);
      
    ```
---
- [Lesson 2.9 - Inheritance](https://youtu.be/LyyzeYOoH5s)
  - Visibility of overridden properties and functions can only be increased. 
  - Parent constructor must be called explicitly in the override constructor if its functionality is required. The 
    default behaviour is that it would override if not called. Syntax: `parent::__construct();`
  - Signature of the child class must be compatible with the signature of the parent class. If not it would throw an 
    Fatal error. Overridden methods could have additional properties though. Please not, this does not apply to 
    constructors where changing signatures is allowed
  - **'is-A' relation makes a good case for inheritance, else if it has a 'has-A' relation composition makes a better 
    case.**
  - Disadvantages of inheritances:-
    - It could break encapsulation by overriding default properties and changing the desired behaviour of the class.
    - All methods and properties are inherited which could not be essentially available in the inherited class.
---
- [Lesson 2.10 - Abstract Classes & Methods](https://youtu.be/UnwaW13xJuw)
---
- [Lesson 2.11 - Interfaces & Polymorphism](https://youtu.be/-AJic0FjuAA)
  - Interfaces can have constants. These cannot be overridden in child classes.
  - Interface can extend multiple interfaces
  - If there are same functions defined in multiple interfaces they should have the same signatures.
  - Concrete classes can implement multiple interfaces 
---
- [Lesson 2.12 - Magic Methods](https://youtu.be/nCxnzj83poQ)
  - `__get`, `__set` magic methods when overridden, would not throw an error when property is not set on an object
  - `__call` and `__callStatic` are used to channelize all calls to functions not defined on a class
    ```php
    <?php
    class MethodTest
    {
        public function __call($name, $arguments)
        {
            // Note: value of $name is case sensitive.
            echo "Calling object method '$name' "
                 . implode(', ', $arguments). "\n";
        }
    
        public static function __callStatic($name, $arguments)
        {
            // Note: value of $name is case sensitive.
            echo "Calling static method '$name' "
                 . implode(', ', $arguments). "\n";
        }
    }
    
    $obj = new MethodTest;
    $obj->runTest('in object context');
    
    MethodTest::runTest('in static context');
    ?>
    ```
  - `__toString()` The __toString() method allows a class to decide how it will react when it is treated like a string. 
  For example, what echo $obj; will print.
    ```php
    public function __call(string $name, $arguments) {}
    public function __callStatic(string $name, $arguments) {} 
    ```
  - The `__invoke()` method is called when a script tries to call an object as a function. 
    ```php
    <?php
    class CallableClass
    {
        public function __invoke($x)
        {
            var_dump($x);
        }
    }
    $obj = new CallableClass;
    $obj(5);
    var_dump(is_callable($obj));
    ?>
    ```
---
- [Lesson 2.13 - Late Static Binding](https://youtu.be/4W5t8g3Rp_0)
  - `self` resolves at compile time while `static` resolves at run time.
  - `$this->someFunction()` resolves at runtime v/s `ClassName::someFunction()` resolves at compile time 
  - `static` could be a return type instead of the self which returns the object by run time compilation rather than 
    compile time compilation
    ```php
    class A
    {
        public static function makeStatic(): static
        {
            return new static();
        }
        public static function make(): self
        {
            return new self;
        }
    }
    class B extends A
    {} 
    
    var_dump(A::make()); #object(A)
    var_dump(B::make()); #object(A)
    var_dump(A::makeStatic()); #object(A)
    var_dump(B::makeStatic()); #object(B)
    
    ```

---
- [Lesson 2.14 - Traits](https://youtu.be/PMruqUC4Qpc)
  - Traits were introduced in to overcome the inheritance diamond problem and reduce duplication and increase reuse
  - Traits is simply copy and paste, all the code from the trait is copied to the class that it uses
  - Objects of traits cannot be instantiated. They can be used in other traits or classes using the `use` keyword
    ```php
    class CoffeeMaker
    {
        protected string $eol = "<br/>";
        public function makeCoffee() { echo static::class . ' is making Coffee' . $this->eol; }
    }
    
    trait CappuccinoTrait
    {
        public function makeCappuccino() { echo static::class . ' is making cappuccino' . $this->eol; }
    }
    trait LatteTrait
    {
        public function makeLatte() { echo static::class . ' is making Latte' . $this->eol;}
    }
    
    class CappuccinoMaker extends CoffeeMaker{ use CappuccinoTrait; }
    
    
    class LatteMaker extends CoffeeMaker { use LatteTrait; }
    
    class AllInOneMaker extends CoffeeMaker { use LatteTrait; use CappuccinoTrait; }
    
    $coffeeMaker = new CoffeeMaker();
    $coffeeMaker->makeCoffee(); #CoffeeMaker is making Coffee
    
    $latteMaker = new LatteMaker();
    $latteMaker->makeCoffee(); #LatteMaker is making Coffee
    $latteMaker->makeLatte(); #LatteMaker is making Latte

    
    $cappuccinoMaker = new CappuccinoMaker();
    $cappuccinoMaker->makeCoffee(); #CappuccinoMaker is making Coffee
    $cappuccinoMaker->makeCappuccino(); #CappuccinoMaker is making cappuccino
    
    $allInOneCoffeeMaker = new AllInOneMaker();
    $allInOneCoffeeMaker->makeCoffee(); #AllInOneMaker is making Coffee
    $allInOneCoffeeMaker->makeLatte(); #AllInOneMaker is making Latte
    $allInOneCoffeeMaker->makeCappuccino(); #AllInOneMaker is making cappuccino
    ```
  - Redefined class functions have override the functions defined in the trait. But traits used in derived class 
    would override the function defined in the base class 
    ```php
        class LatteMaker extends CoffeeMaker { use LatteTrait;
            public function makeLatte() { echo static::class . ' is making Updated Latte' . $this->eol;}
        }
        $latteMaker->makeLatte(); #LatteMaker is making Updated Latte
    ```
  - The diamond problem can also occur while using multiple traits, which could be resolved using `insteadof` 
    operator 
    ```php
    class AllInOneMaker extends CoffeeMaker { 
        use LatteTrait; 
        use CappuccinoTrait {
            LattheTrait::makeLatte insteadof CappuccinoTrait;
        } 
    }
    ```

    ```php
    class AllInOneMaker extends CoffeeMaker { 
        use LatteTrait {
            LatteTrait::makeLatte as makeOriginalLatte;       
        }    
        use CappuccinoTrait;
    }
    $latteMaker = new LatteMaker();
    $latteMaker->makeOriginalLatte();
    ```
  - Visibility of function can be overridden in the traits which could spell disaster in terms of encapsulation
    ```php
    class AllInOneMaker extends CoffeeMaker { 
        use LatteTrait {
            LatteTrait::makeLatte as public;       
        }    
        use CappuccinoTrait;
    }
    $latteMaker = new LatteMaker();
    $latteMaker->makeOriginalLatte();
    ```
  - Properties can be set in traits. Please note that the classes using the traits cannot define the same properties 
    with a different type, visibility and default value.
  - :skull: Traits can use the properties and functions defined in the class which use it. This increases ambiguity 
    in and is 
    not the best way of implementing traits.
  - If the trait needs to enforce a method to be implemented by the class it would be used in, it could define an 
    abstract method. Please note the trait does not have to be abstract in that case.  Public, protected, and private 
    methods are supported. Prior to PHP 8.0.0, only public and protected abstract methods were supported.
  - Traits can define static variables, static methods and static properties. As of PHP 8.1.0, calling a static method, 
    or accessing a static property directly on a trait is deprecated. Static methods and properties should only be 
    accessed on a class using the trait.
  - :skull: When static properties defined in trait are used in different classes, objects of each class would have 
    its own
    instance of the static property which would not be shared between them. 
  - :skull: Using abstract methods in traits to enforce contracts is not the best way of implementing contracts. 
    Interfaces 
    should be used instead.
  - :skull: Traits could override final functions which could be a disaster waiting to happen.
---
- [Lesson 2.15 - Anonymous Classes](https://youtu.be/zQ4Znj3RT3E)
  - Majorly used for mocking during testing
  - Can implement interfaces, extend classes
  - They do not have a name and hence cannot be used for type hinting.

    ```php
    $obj = new class () {
        public function __construct()
        {
            echo "called anon class";
        }
    };
    
    var_dump($obj); #called anon class
    ```
- [Lesson 2.16 - Object Comparison - Variable Storage & Zend Value (zval) Container](https://youtu.be/zCGmZb3z-r8)
- [Lesson 2.17 - DocBlock](https://youtu.be/hdDD0SNJ-pk)
- [Lesson 2.18 - Object Cloning](https://youtu.be/vLmIoy6Bnog)
- [Lesson 2.19 - Object Serialization](https://youtu.be/Jnm2m_Iw5CI)
- [Lesson 2.20 - Exceptions](https://youtu.be/XQ5Pd-6Hnjk)
- [Lesson 2.21 - DateTime Object](https://youtu.be/hkTQkaFzEEo)
- [Lesson 2.22 - Iterable Data Type & Iterators](https://youtu.be/QFPP9B-Q3zM)
- [Lesson 2.23 - Superglobals - Basic Routing Using \$_SERVER Info](https://youtu.be/CF7Yy5cPFVM)
- [Lesson 2.24 - Superglobals - \$_GET/\$_POST - Forms](https://youtu.be/JdrvETQCAGw)
- [Lesson 2.25 - Superglobals - Sessions & Cookies - Output Buffering](https://youtu.be/6vM-9ou1ARo)
- [Lesson 2.26 - Superglobals - \$_FILES - File Uploads](https://youtu.be/5PWGAC-mafU)
- [Lesson 2.27 - Intro to MVC](https://youtu.be/QiO0uUwOiBg)
- [Lesson 2.28 - HTTP Headers](https://youtu.be/W7tj0Qlk3rE)
- [Lesson 2.29 - Intro to MySQL](https://youtu.be/mSnte-Ovm10)
- [Lesson 2.30 - PDO Part 1 - Prepared Statements - SQL Injection](https://youtu.be/wcD5HlEHrnc)
- [Lesson 2.31 - PDO Part 2 - Transactions - ENV Variables](https://youtu.be/e6yLUvpcOZo)
- [Lesson 2.32 - PDO Part 3 - Models & Refactoring](https://youtu.be/iCKzIIE4w5E)
- [Lesson 2.33 - Section 2 Review & Exercise Project](https://youtu.be/D1EshhwNt48)

# Section 3 - Advanced PHP (OOP)

- [Lesson 3.0 - Intro to Testing](https://youtu.be/hTACGV_LdqE)
- [Lesson 3.1 - Unit Testing - PHPUnit Part 1](https://youtu.be/9-X_b_fxmRM)
- [Lesson 3.2 - Mocking - PHPUnit Part 2](https://youtu.be/EhkeoV8nfCQ)
- [Lesson 3.3 - Dependency Injection & DI Containers](https://youtu.be/igx3bIl1T_c)
- [Lesson 3.4 - DI Container With & Without Reflection API](https://youtu.be/78Vpg97rQwE)
- [Lesson 3.5 - DI Container With Interface Support](https://youtu.be/0YDRQbgHBO8)
- [Lesson 3.6 - Generators](https://youtu.be/xH3snMmgDWg)
- [Lesson 3.7 - WeakMap](https://youtu.be/zDKnI_YKCDc)
- [Lesson 3.8 - New In PHP 8.1](https://youtu.be/cO6i_4n2iwA)
- [Lesson 3.9 - Covariance & Contravariance](https://youtu.be/AgSrOI7N-fU)
- [Lesson 3.10 - Attributes - Simple Router With Attributes](https://youtu.be/I7WJa-he5oM)
- [Lesson 3.11 - Enums](https://youtu.be/5Cgio2OfOYk)
- [Lesson 3.12 - Composition vs Inheritance](https://youtu.be/djd9zdlzyuA8)
- [Lesson 3.13 - Send Emails - Symfony Mailer](https://youtu.be/pHJCgkzVGXk)
- [Lesson 3.14 - Schedule Emails - CRON](https://youtu.be/9q1Nt6lHXq8)
- [Lesson 3.15 - Intro to Doctrine - DataBase Abstraction Layer - DBAL](https://youtu.be/bfTIVQvS5JI)
- [Lesson 3.16 - Doctrine ORM - Entities & Data Mapper Pattern](https://youtu.be/P2PYrZGqhLU)
- [Lesson 3.17 - Doctrine ORM Query Builder & DQL](https://youtu.be/awrtwSdwXHA)
- [Lesson 3.18 - Doctrine Migrations](https://youtu.be/peXlH04Hecc)
- [Lesson 3.19 - Active Record Pattern & Intro To Laravel Eloquent](https://youtu.be/ZRdgVuIppYQ)
- [Lesson 3.20 - Refactor to use Eloquent instead of Doctrine DBAL](https://youtu.be/aPXkO-ffkA8)
- [Lesson 3.21 - PHP cURL API Tutorial & Emailable API Integration](https://youtu.be/cbpWykgjGTI)
- [Lesson 3.22 - Refactor cURL to Guzzle With Retry Logic - Multiple API Integrations](https://youtu.be/c2ZP2FxD5I0)
- [Lesson 3.23 - Data Transfer Objects - What Are DTOs](https://youtu.be/35QmeoPLPOQ)
- [Lesson 3.24 - Value Objects Practical Example](https://youtu.be/agIL1EUozhQ)
- [Lesson 3.25 - Intro to Templating Engines - Blade & Twig](https://youtu.be/MSH32ri-kBg)
- [Lesson 3.26 - How To Install Xdebug 3 with Docker & PhpStorm](https://youtu.be/7YuYxbYd3P0)
- [Lesson 3.27 - How To Deploy Vanilla PHP To Cloudways](https://youtu.be/78U5jLTLBbM)
- [Lesson 3.28 - Intro to Slim PHP Framework](https://youtu.be/wCZUD6LBdRg)
- [Lesson 3.29 - Add DI Container & Doctrine ORM To Slim PHP Framework](https://youtu.be/pgYDzlXOYD4)
- [Lesson 3.30 - Little Refactoring Never Hurt Nobody](https://youtu.be/Pn-Kz6GXCKg)
- [Lesson 3.31 - Create & Run CLI Commands With Symfony Console](https://youtu.be/_62MNEOo1Fs)
- [Lesson 3.32 - 100th Video In This PHP Series - Project Overview](https://youtu.be/AtxZKob8IVQ)

# Section P - Project Expennies

- [Lesson P.0 - Expennies Project Setup - NPM & Webpack](https://youtu.be/RMpV5R8wNgw)
- [Lesson P.1 - Let's Do Some Data Modeling & Create Entities](https://youtu.be/pKXojbZ64c4)
- [Lesson P.2 - User Registration & Password Hashing](https://youtu.be/TqXMaj2Z-GQ)
- [Lesson P.3 - Add Form Validation](https://youtu.be/eJxIqV9UBC4)
- WIP
