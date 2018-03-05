Requirements
------------

* linux or bsd system
* PHP 5.3 or greater
* pdo_sqlite

Running All The Benchmarks
--------------------------

    > cd /path/to/php-orm-benchmark
    > php TestRunner.php

Running One Of The Benchmarks
-----------------------------

    > cd /path/to/php-orm-benchmark
    > cd propel_20
    > php TestRunner.php

Test Scenarios
--------------

1. Mass insertion: Tests model objects and save() operations.

2. Retrieve By Pk: Tests basic hydration

3. Complex Query an OR but no hydration: Tests Query parsing

4. Basic Query with 5 results: Tests hydration and collections

5. Query with join: Tests join hydration


Results
-------

The reference is the PDOTestSuite (the number of tests is adjusted to make raw
PDO score about 100 to each test). For the ORMs, the smaller score is the
better (i. e. the faster).

## PHP CLI 7.1.0

(updated 2018-Feb-01)

| Library                          | Insert | findPk | complex| hydrate|  with  | memory usage |  time  |
| --------------------------------:| ------:| ------:| ------:| ------:| ------:| ------------:| ------:|
|                              PDO |     58 |      7 |     19 |     56 |    129 |    1,701,016 |   0.27 |
|                                  |        |        |        |        |        |              |        |
|                          Maghead |    399 |      4 |    299 |    189 |    273 |   10,485,760 |   1.18 |
|                                  |        |        |        |        |        |              |        |
|                           LessQL |    329 |     59 |    244 |    305 |    336 |    7,993,624 |   1.28 |
|                                  |        |        |        |        |        |              |        |
|                         AtlasOrm |    254 |    183 |    253 |    425 |    390 |    5,896,024 |   1.52 |
|                                  |        |        |        |        |        |              |        |
|                             YiiM |    696 |     79 |    294 |    290 |    523 |    6,291,456 |   1.90 |
|                    YiiMWithCache |    690 |     83 |    295 |    289 |    518 |    6,291,456 |   1.89 |
|                                  |        |        |        |        |        |              |        |
|                            Yii2M |   1389 |    170 |    426 |    606 |    983 |    8,388,608 |   3.59 |
|                Yii2MArrayHydrate |   1397 |    176 |    422 |    276 |    863 |    8,388,608 |   3.16 |
|               Yii2MScalarHydrate |   1377 |    171 |    416 |    253 |    488 |    8,388,608 |   2.73 |
|                                  |        |        |        |        |        |              |        |
|                  PHPActiveRecord |   2016 |    175 |    384 |   1025 |    447 |    4,194,304 |   5.20 |
|                                  |        |        |        |        |        |              |        |
|                             Fuel |   2578 |    146 |    624 |   1173 |    293 |   12,582,912 |   4.86 |
|                    FuelWithCache |   1742 |     24 |    466 |    934 |     43 |    8,388,608 |   3.25 |
|                                  |        |        |        |        |        |              |        |
|                         Propel20 |    578 |     50 |   1367 |   1231 |   1596 |    8,388,608 |   4.83 |
|                Propel20WithCache |    485 |     39 |    857 |   1068 |   1529 |    8,388,608 |   3.99 |
|           Propel20FormatOnDemand |    483 |     40 |    856 |    941 |   1526 |    8,388,608 |   3.86 |
|                                  |        |        |        |        |        |              |        |
|                        DoctrineM |    979 |    141 |    411 |    801 |    602 |   18,874,368 |   3.01 |
|               DoctrineMWithCache |    979 |    143 |    407 |    800 |    598 |   18,874,368 |   3.00 |
|            DoctrineMArrayHydrate |    968 |    139 |    412 |    416 |    342 |   18,874,368 |   2.35 |
|           DoctrineMScalarHydrate |    967 |    142 |    408 |    369 |    329 |   18,874,368 |   2.29 |
|          DoctrineMWithoutProxies |    975 |    143 |    417 |    599 |    662 |   18,874,368 |   2.87 |
|                                  |        |        |        |        |        |              |        |
|                         Eloquent |   1638 |    175 |    523 |    447 |    823 |   14,680,064 |   3.63 |
|             EloquentWithoutEvent |   1459 |    176 |    546 |    440 |    809 |   14,680,064 |   3.45 |


(updated 2017-Feb-01)

| Library                          | Insert | findPk | complex| hydrate|  with  | memory usage |  time  |
| --------------------------------:| ------:| ------:| ------:| ------:| ------:| ------------:| ------:|
|                              PDO |     24 |      5 |     10 |     56 |    184 |    1,699,136 |   0.28 |
|                                  |        |        |        |        |        |              |        |
|                          Maghead |     91 |      1 |     56 |     95 |    228 |    8,388,608 |   0.48 |
|                                  |        |        |        |        |        |              |        |
|                           LessQL |    102 |     26 |    330 |    142 |    175 |    7,990,728 |   0.78 |
|                                  |        |        |        |        |        |              |        |
|                             YiiM |    172 |     20 |    309 |     95 |    306 |    6,291,456 |   0.92 |
|                    YiiMWithCache |    160 |     21 |    308 |    100 |    304 |    6,291,456 |   0.91 |
|                                  |        |        |        |        |        |              |        |
|                            Yii2M |    316 |     40 |    293 |    160 |    340 |    6,291,456 |   1.17 |
|                Yii2MArrayHydrate |    305 |     42 |    315 |    100 |    291 |    6,291,456 |   1.07 |
|               Yii2MScalarHydrate |    304 |     43 |    296 |    107 |    177 |    6,291,456 |   0.94 |
|                                  |        |        |        |        |        |              |        |
|                         Propel20 |    140 |     16 |    410 |    287 |    413 |    8,388,608 |   1.27 |
|                Propel20WithCache |    111 |     10 |    363 |    247 |    336 |    8,388,608 |   1.08 |
|           Propel20FormatOnDemand |     96 |     11 |    366 |    223 |    334 |    8,388,608 |   1.04 |
|                                  |        |        |        |        |        |              |        |
|                        DoctrineM |    183 |     38 |    311 |    227 |    220 |   18,874,368 |   1.02 |
|               DoctrineMWithCache |    192 |     45 |    310 |    237 |    233 |   18,874,368 |   1.05 |
|            DoctrineMArrayHydrate |    178 |     45 |    292 |    136 |    162 |   16,777,216 |   0.86 |
|           DoctrineMScalarHydrate |    178 |     40 |    296 |    119 |    136 |   16,777,216 |   0.81 |
|          DoctrineMWithoutProxies |    168 |     40 |    320 |    172 |    352 |   16,777,216 |   1.09 |
|                                  |        |        |        |        |        |              |        |
|                         Eloquent |    367 |     54 |    373 |    157 |    311 |    8,388,608 |   1.28 |
|             EloquentWithoutEvent |    313 |     42 |    377 |    157 |    282 |    8,388,608 |   1.18 |


## PHP CLI 5.6.4 with opcode cache

(updated 2015-Dec-07)

| Library                          | Insert | findPk | complex| hydrate|  with  | memory usage |  time  |
| --------------------------------:| ------:| ------:| ------:| ------:| ------:| ------------:| ------:|
|                              PDO |     49 |     45 |      0 |     33 |     92 |      775,264 |   0.22 |
|                                  |        |        |        |        |        |              |        |
|                           LessQL |    153 |    154 |      0 |    114 |    135 |    5,232,880 |   0.57 |
|                                  |        |        |        |        |        |              |        |
|                             YiiM |    211 |    138 |      0 |     79 |    201 |    9,961,472 |   0.67 |
|                    YiiMWithCache |    217 |    148 |      0 |     88 |    222 |    9,961,472 |   0.71 |
|                                  |        |        |        |        |        |              |        |
|                            Yii2M |    603 |    338 |      0 |    187 |    252 |   14,155,776 |   1.46 |
|                Yii2MArrayHydrate |    585 |    327 |      0 |    120 |    220 |   14,155,776 |   1.31 |
|               Yii2MScalarHydrate |    571 |    321 |      0 |    105 |    102 |   14,155,776 |   1.17 |
|                                  |        |        |        |        |        |              |        |
|                         Propel20 |    218 |    105 |      0 |    263 |    323 |   10,747,904 |   0.98 |
|                Propel20WithCache |    156 |     68 |      0 |    228 |    261 |   10,747,904 |   0.77 |
|           Propel20FormatOnDemand |    151 |     67 |      0 |    221 |    264 |   11,010,048 |   0.76 |
|                                  |        |        |        |        |        |              |        |
|                        DoctrineM |    252 |    280 |      0 |    342 |    193 |   17,301,504 |   1.55 |
|               DoctrineMWithCache |    266 |    272 |      0 |    332 |    189 |   17,039,360 |   1.54 |
|            DoctrineMArrayHydrate |    263 |    282 |      0 |    226 |    141 |   17,825,792 |   1.35 |
|           DoctrineMScalarHydrate |    242 |    292 |      0 |    192 |    123 |   17,825,792 |   1.25 |
|          DoctrineMWithoutProxies |    243 |    266 |      0 |    253 |    251 |   16,777,216 |   1.43 |
|                                  |        |        |        |        |        |              |        |
|                         Eloquent |    419 |    254 |      0 |    126 |    218 |   11,534,336 |   1.09 |
|             EloquentWithoutEvent |    380 |    260 |      0 |    124 |    232 |   11,534,336 |   1.06 |

## HHVM CLI 3.10.1 (Corresponding roughly to an up-to-date PHP 5.6)

(updated 2015-Dec-07)

| Library                          | Insert | findPk | complex| hydrate|  with  | memory usage |  time  |
| --------------------------------:| ------:| ------:| ------:| ------:| ------:| ------------:| ------:|
|                              PDO |     54 |     30 |      0 |     37 |     92 |      783,680 |   0.23 |
|                                  |        |        |        |        |        |              |        |
|                           LessQL |    165 |    194 |      0 |     78 |    135 |   10,316,584 |   0.66 |
|                                  |        |        |        |        |        |              |        |
|                             YiiM |    333 |    194 |      0 |     81 |    494 |    7,267,424 |   1.33 |
|                    YiiMWithCache |    337 |    191 |      0 |     81 |    465 |    7,286,040 |   1.30 |
|                                  |        |        |        |        |        |              |        |
|                            Yii2M |    722 |    272 |      0 |    103 |    175 |    9,025,400 |   1.90 |
|                Yii2MArrayHydrate |    702 |    273 |      0 |    100 |    165 |    9,033,272 |   1.83 |
|               Yii2MScalarHydrate |    700 |    291 |      0 |     90 |     70 |    8,997,160 |   1.74 |
|                                  |        |        |        |        |        |              |        |
|                         Propel20 |    545 |    169 |      0 |    771 |    512 |    9,740,696 |   2.30 |
|                Propel20WithCache |    481 |    135 |      0 |    736 |    485 |    9,807,688 |   2.14 |
|           Propel20FormatOnDemand |    479 |    128 |      0 |    675 |    463 |    9,822,696 |   2.05 |
|                                  |        |        |        |        |        |              |        |
|                        DoctrineM |    634 |    647 |      0 |   1009 |    342 |   19,639,560 |   5.11 |
|               DoctrineMWithCache |    624 |    674 |      0 |   1047 |    339 |   19,635,128 |   5.07 |
|            DoctrineMArrayHydrate |    629 |    642 |      0 |    804 |    249 |   18,447,232 |   4.73 |
|           DoctrineMScalarHydrate |    618 |    634 |      0 |    747 |    203 |   17,366,336 |   4.55 |
|          DoctrineMWithoutProxies |    620 |    629 |      0 |    849 |    357 |   19,402,032 |   4.85 |
|                                  |        |        |        |        |        |              |        |
|                         Eloquent |    589 |    273 |      0 |     98 |    203 |   14,652,488 |   1.53 |
|             EloquentWithoutEvent |    547 |    264 |      0 |     99 |    206 |   14,572,112 |   1.45 |   


## HHVM 3.11.x (Corresponding roughly to an up-to-date PHP 7.0)

TODO

Running benchmarks using the Docker shell
-----------------------------------------

See [.docker-stack/README.md](./.docker-stack/README.md)
