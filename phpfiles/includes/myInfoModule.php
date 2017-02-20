<!-- Beginning of the Flag Selection; -->
                <div id="worldFlags" class="center">
                    <p id="flagTitle">Select a Flag to Find the Country in <?=$region?>;</p>
                    <div id="flags">
                        <!-- flags img statements are read via PHP through a JSON file -->
                        <?php while ($titleSeq < $howManyFlags) { ?>
                        <!--  -->
                        <img id="flag<?=$titleSeq?>" src="images/smallFlags/<?=$flagOfCountries['countries'][$titleSeq++] . '.png'?>">
                        <?php } ?>
                    <!--  -->
                    </div>

                    <form method='GET' action='/'>
                        <fieldset id="flagFieldSet">
                            <input type='hidden' name='savedRegion'>
                            <div class="floatingInput"><label><input type='radio' name='region' value='Africa' CHECKED
                                <?php if ($region == 'Africa') echo 'CHECKED'?>>  Africa</label></div>
                            <div class="floatingInput"><label><input type='radio' name='region' value='Asia'
                                <?php if ($region == 'Asia') echo 'CHECKED'?>> Asia</label></div>
                            <div class="floatingInput"><label><input type='radio' name='region' value='Europe'
                                <?php if ($region == 'Europe') echo 'CHECKED'?>> Europe</label></div>
                            <div class="floatingInput"><label><input type='radio' name='region' value='North America'
                                <?php if ($region == 'North America') echo 'CHECKED'?>> North America</label></div>
                            <div class="floatingInput"><label><input type='radio' name='region' value='Oceania'
                                <?php if ($region ==  'Oceania') echo 'CHECKED'?>> Oceania</label></div>
                            <div class="floatingInput"><label><input type='radio' name='region' value='South America'
                                <?php if ($region == 'South America') echo 'CHECKED'?>> South America</label></div>
                            <div class="floatingInput inputTopMargin"><label>Population
                                <select name='population' id='population'>
                                    <option value='choose' <?php if ($selectedPopulation == 'choose') echo 'SELECTED'?>>Choose one...</option>
                                    <option value='1' <?php if ($selectedPopulation == '1') echo 'SELECTED'?>>< 1 Million</option>
                                    <option value='1,5' <?php if ($selectedPopulation == '1,5') echo 'SELECTED'?>>>= 1 < 5 Millions</option>
                                    <option value='5,10' <?php if ($selectedPopulation == '5,10') echo 'SELECTED'?>>>= 5 < 10 Millions</option>
                                    <option value='10,15' <?php if ($selectedPopulation == '10,15') echo 'SELECTED'?>>>= 10 < 15 Millions</option>
                                    <option value='15,20' <?php if ($selectedPopulation == '15,20') echo 'SELECTED'?>>>= 15 < 20 Millions</option>
                                    <option value='20,30' <?php if ($selectedPopulation == '20,30') echo 'SELECTED'?>>>= 20 < 30 Millions</option>
                                    <option value='30,40' <?php if ($selectedPopulation == '30,40') echo 'SELECTED'?>>>= 30 < 40 Millions</option>
                                    <option value='40,50' <?php if ($selectedPopulation == '40,50') echo 'SELECTED'?>>>= 40 < 50 Millions</option>
                                    <option value='50,60' <?php if ($selectedPopulation == '50,60') echo 'SELECTED'?>>>= 50 < 60 Millions</option>
                                    <option value='60,70' <?php if ($selectedPopulation == '60,70') echo 'SELECTED'?>>>= 60 < 70 Millions</option>
                                    <option value='80,100' <?php if ($selectedPopulation == '80,100') echo 'SELECTED'?>>>= 70 < 100 Millions</option>
                                    <option value='100,150' <?php if ($selectedPopulation == '100,150') echo 'SELECTED'?>>>= 100 < 150 Millions</option>
                                    <option value='150,200' <?php if ($selectedPopulation == '150,200') echo 'SELECTED'?>>>= 150 < 200 Millions</option>
                                    <option value='200,250' <?php if ($selectedPopulation == '200,250') echo 'SELECTED'?>>>= 200 < 250 Millions</option>
                                    <option value='250,300' <?php if ($selectedPopulation == '250,300') echo 'SELECTED'?>>>= 250 < 300 Millions</option>
                                    <option value='300-500' <?php if ($selectedPopulation == '300-500') echo 'SELECTED'?>>>= 300 < 500 Millions</option>
                                    <option value='500,1000' <?php if ($selectedPopulation == '500,1000') echo 'SELECTED'?>>>= 500 Millions < 1 Billion</option>
                                    <option value='1000,2000' <?php if ($selectedPopulation == '1000,2000') echo 'SELECTED'?>>>= 1 Billions < 2 Billions</option>
                                </select></label>
                            </div>
                            <!-- options will be read via PHP through a JSON file -->
                            <div class="floatingInput">
                                <label>Language
                                    <select name='language' id='language'>
                                        <option value='choose'>Choose one...</option>
                                        <option value='English' <?php if (isset($_GET['language']) && $_GET['language'] == 'English') echo 'SELECTED'?>>English</option>
                                    </select>
                                </label>
                            </div>
                            <!-- only one letter as the first of a capital name can be entered -->
                            <div class="floatingInput">
                                <label>Capital
                                    <input type='input' name='capital' id='capital' value='<?php if(isset($_GET['capital'])) echo $_GET['capital'] ?>'>
                                </label>
                            </div>
                        </fieldset>
                        <input type='submit' value="My Score">
                        <button id="rulesButton">Rules</button>
                        <button id="resetButton">Reset</button>
                    </form>
                </div>
