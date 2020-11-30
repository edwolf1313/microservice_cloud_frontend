<!--////////////////////////////////////Container-->
<section id="container">
  <div class="wrap-container">
    <section class="content-box zerogrid">
      <div class="row wrap-box">
        <div class="contact-form">
          <h3 class="t-center">REGISTER</h3>
          <div id="contact_form">
            <form name="form1" id="ff" method="post" action="<?=$web_url ;?>/index/REGISTER_USER">
              <label class="row">
                <div class="col-3-6">
                  <div class="wrap-col">
                    <input type="text" name="username" id="username" placeholder="Enter username" required="required" />
                  </div>
                </div>
                <div class="col-3-6">
                  <div class="wrap-col">
                    <input type="password" name="password" id="password" placeholder="Enter password" required="required" />
                  </div>
                </div>
              </label>
              <center><input class="sendButton" type="submit" name="Submit" value="Submit"></center>
            </form>
          </div>
        </div>
      </div>
    </section>

  </div>
</section>
