
<?php include "../helper/header.php"  ?>
    <main>
	<div>
	<h2> Instructions :</h2>
	<div style="background-color: lightgrey;margin : 25px; padding : 20px">
<p><span style="font-weight: 400;">You will be required </span><span style="font-weight: 400;">to sign up for a&nbsp; </span><a href="http://k2s.cc"><span style="font-weight: 400;">k2s.cc</span></a><span style="font-weight: 400;"> account. If </span><a href="http://k2s.cc"><span style="font-weight: 400;">k2s.cc</span></a><span style="font-weight: 400;"> is not directly accessible, please use a VPN or a proxy.</span></p>
<p><span style="font-weight: 400;">You should use </span><strong>PHP version: 5.6</strong><span style="font-weight: 400;"> in all of the assignments</span></p>
<p><strong>Assignment 1 - Scraping Data (Easy):</strong></p>
<p><span style="font-weight: 400;">We will be Mimicking browsers and scraping data using CURL or Socket.</span></p>
<p><span style="font-weight: 400;">Here, we are going to be focusing on https://k2s.cc&nbsp; website</span></p>
<p><strong>Instructions:</strong></p>
<p><span style="font-weight: 400;">Create a class object which will log in to https://k2s.cc using the username &amp; password parameters used in class init and use logged in "cookies/session" to access their profile page https://k2s.cc/profile&nbsp;</span></p>
<p><span style="font-weight: 400;">Return following values by parsing the page</span></p>
<p><span style="font-weight: 400;">"Account type:" as a string, "Traffic left today for viewing/downloading" as integer (bytes),"Used traffic today" as integer (bytes), it will also return access_key / cookies used to access these data for later user</span></p>
<p><span style="font-weight: 400;">You can use cURL / fsocket for requests. we don't prefer a pre-written library/bundle for web-request</span></p>
<p><strong>Note:&nbsp; All components of the problem should work and result in the desired output</strong></p>
<p><strong>Assignment 2 - </strong><strong>Cloudflare Encryption Bypass (Difficult)</strong><strong>:</strong></p>
<p><span style="font-weight: 400;">Access following URL </span><a href="https://devza.com/cftest.php"><span style="font-weight: 400;">https://devza.com/cftest.php</span></a><span style="font-weight: 400;"> bypassing Cloudflare javascript browser </span><span style="font-weight: 400;">integrity check</span></p>
<p><span style="font-weight: 400;">You will have to create a class/function which will solve their javascript puzzle and use the solution to access the target page and return displayed numbers from the target page</span></p>
<p><span style="font-weight: 400;">(The best solution is to convert their javascript problem dynamically in PHP function by parsing it or improvise and surprise us)</span></p>
<p><strong>Note: Write down your detailed approach if you cannot finish this assignment</strong></p>
<p><strong>Evaluation Parameters</strong></p>
<ol>
<li style="font-weight: 400;"><span style="font-weight: 400;">Code quality - code should be written efficiently</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Architecture - how extensible is the code to solve future enhancements)</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Test cases - How easy it is to debug failures</span></li>
<li style="font-weight: 400;"><span style="font-weight: 400;">Ease of deploying new versions of code</span></li>
</ol>	
	</div>
	</div> 
    </main>
    <footer>
	<div></div>  
    </footer>
</div>

</body>
</html>

