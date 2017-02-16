<!-- Beginning of the Flag Selection; -->
                <div class="center">
                    <img src="images/worldCountriesByFlags.jpg">
                    <form method='POST' action='/'>
                        <fieldset>
                            <legend>Facts</legend>
                            <input type='hidden' name='dummy' value='0'>
                            <label for='continent'>Continent</label>
                            <input type='input' name='continent' id='continent' value='<?php if(isset($_GET['continent'])) echo $_GET['continent'] ?>'> </br>
                            <label for='population'>Population</label>
                            <input type='input' name='population' id='population' value='<?php if(isset($_GET['population'])) echo $_GET['population'] ?>'> </br>
                            <label for='language'>Language</label>
                            <input type='input' name='language' id='language' value='<?php if(isset($_GET['language'])) echo $_GET['language'] ?>'> <br/>
                            <label for='capital'>Capital</label>
                            <input type='input' name='capital' id='capital' value='<?php if(isset($_GET['capital'])) echo $_GET['capital'] ?>'>
                        </fieldset>
                        <input type='submit' value="Pick One">
                    </form>
                </div>
