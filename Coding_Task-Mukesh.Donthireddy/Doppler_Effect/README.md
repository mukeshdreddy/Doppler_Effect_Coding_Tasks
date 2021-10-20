#Doppler Effect Simulation Coding Task#



###Task Requirements###

1. The star color should change based on the value of the velocity input, where:
    a. 0 = no color change
    b. -100 = blue
    c. 100 = red
2. The velocity input should accept numbers only, which are limited to the range of the slider.
3. The slider should be based on either a log or exponential scale, providing more detail in the low velocity range (blue).

###Instructions###

Simply open up **index.html** in the browser of your choice. All images and libraries are included in the zip file.

###Approach###

* I used **jQuery** for my JavaScript framework, since it's  lightweight while being suitable for the DOM manipulations and event handling in my app. jQuery is also compatible across all browsers.
* I cached the jQuery selectors to prevent rescanning the DOM each time the selector is called. Since the DOM is pretty simple, this may not have a noticeable effect on performance.
* To simulate color change of the star, I added a "filter" div on top of the image and set its color/ opacity/blur dynamically on velocity change via jQuery.
* Since the Doppler effect involves movement of the star towards or away from the observer, I also dynamically set the size of the star image and filter on velocity change to simulate this movement.
* The slider is on a logarithmic scale, with values equal to log(velocity + 101) * 100.
* On Set button click, the app converts the input value into its logarithmic equivalent and sets the slider value to that new value. The reverse is done on slide event.
* **Bootstrap** is used for styling of Set button.
* Error message is shown automatically when the input is not a number between -100 and 100.