#TODO:
### **A/B Testing**

Exads would like to A/B test some promotional designs to see which provides the best conversion rate.

- [ ] Install packagist.org/exads/ab-test-data
- [ ] Write a snippet of PHP code that redirects end users to the different designs based on the data
  provided by this library: packagist.org/exads/ab-test-data
- [ ] The code needs to be object-oriented and scalable. The number of designs per promotion may vary.

The data will be structured as follows:

```
"promotion" => [
 "id" => 1,
 “name” => “main”,
 “designs” => [
    [ “designId” => 1, “designName” => “Design 1”, “splitPercent” => 50 ],
    [ “designId” => 2, “designName” => “Design 2”, “splitPercent” => 25 ],
    [ “designId” => 3, “designName” => “Design 3”, “splitPercent” => 25 ],
  ]
]
```
# Run project 
```
1.- start server local or apache server
$ php -S localhost:8000
2.- check url on the chrome 
http://localhost:8000/
3.- select one link after that you should see the design using testab 



