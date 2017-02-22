<!-- Beginning of the Flag Selection; -->
                <div id="worldFlags" class="center">
                    <p id="flagTitle">Select a Flag to Find the Country in <?=$region?></p>
                    <div id="flags">
                        <!-- flags img statements are read via PHP through a JSON file -->
                        <?php while ($flagTitleSeq < $howManyFlags) { ?>
                        <!--  -->
                        <img id="flag<?=$flagTitleSeq?>" class="plainFlags"
                             src="images/smallFlags/<?=$flagOfCountries['countries'][$flagTitleSeq] . '.png'?>"
                             alt="<?=$flagOfCountries['countries'][$flagTitleSeq++]?>"> <!-- ++ must be here only -->
                        <?php } ?>
                    <!--  -->
                    </div>

                    <form method='GET' action='/'>
                        <fieldset id="flagFieldSet">
                            <input type='hidden' name='savedRegion'>
                            <div class="floatingInput"><label><input id="africa" type='radio' name='region' value='Africa' CHECKED
                                <?php if ($region == 'Africa') echo 'CHECKED'?>>  Africa</label></div>
                            <div class="floatingInput"><label><input id='asia' type='radio' name='region' value='Asia'
                                <?php if ($region == 'Asia') echo 'CHECKED'?>> Asia</label></div>
                            <div class="floatingInput"><label><input id="europe" type='radio' name='region' value='Europe'
                                <?php if ($region == 'Europe') echo 'CHECKED'?>> Europe</label></div>
                            <div class="floatingInput"><label><input id="northAmerica" type='radio' name='region' value='North America'
                                <?php if ($region == 'North America') echo 'CHECKED'?>> North America</label></div>
                            <div class="floatingInput"><label><input id="oceania" type='radio' name='region' value='Oceania'
                                <?php if ($region ==  'Oceania') echo 'CHECKED'?>> Oceania</label></div>
                            <div class="floatingInput"><label><input id="southAmerica" type='radio' name='region' value='South America'
                                <?php if ($region == 'South America') echo 'CHECKED'?>> South America</label></div>
                            <div class="floatingInput inputTopMargin"><label>Population
                                <select id='population' name='population' id='population'>
                                    <option value='choose' <?php if ($selectedPopulation == 'choose') echo 'SELECTED'?>>Choose one...</option>
                                    <option value='1' <?php if ($selectedPopulation == '1') echo 'SELECTED'?>>0 to 1 Million</option>
                                    <option value='1,5' <?php if ($selectedPopulation == '1,5') echo 'SELECTED'?>>1 to 5 Millions</option>
                                    <option value='5,10' <?php if ($selectedPopulation == '5,10') echo 'SELECTED'?>>5 to 10 Millions</option>
                                    <option value='10,15' <?php if ($selectedPopulation == '10,15') echo 'SELECTED'?>>10 to 15 Millions</option>
                                    <option value='15,20' <?php if ($selectedPopulation == '15,20') echo 'SELECTED'?>>15 to 20 Millions</option>
                                    <option value='20,30' <?php if ($selectedPopulation == '20,30') echo 'SELECTED'?>>20 to 30 Millions</option>
                                    <option value='30,40' <?php if ($selectedPopulation == '30,40') echo 'SELECTED'?>>30 to 40 Millions</option>
                                    <option value='40,50' <?php if ($selectedPopulation == '40,50') echo 'SELECTED'?>>40 to 50 Millions</option>
                                    <option value='50,60' <?php if ($selectedPopulation == '50,60') echo 'SELECTED'?>>50 to 60 Millions</option>
                                    <option value='60,70' <?php if ($selectedPopulation == '60,70') echo 'SELECTED'?>>60 to 70 Millions</option>
                                    <option value='80,100' <?php if ($selectedPopulation == '80,100') echo 'SELECTED'?>>70 to 100 Millions</option>
                                    <option value='100,150' <?php if ($selectedPopulation == '100,150') echo 'SELECTED'?>>100 to 150 Millions</option>
                                    <option value='150,200' <?php if ($selectedPopulation == '150,200') echo 'SELECTED'?>>150 to 200 Millions</option>
                                    <option value='200,250' <?php if ($selectedPopulation == '200,250') echo 'SELECTED'?>>200 to 250 Millions</option>
                                    <option value='250,300' <?php if ($selectedPopulation == '250,300') echo 'SELECTED'?>>250 to 300 Millions</option>
                                    <option value='300-500' <?php if ($selectedPopulation == '300-500') echo 'SELECTED'?>>300 to 500 Millions</option>
                                    <option value='500,1000' <?php if ($selectedPopulation == '500,1000') echo 'SELECTED'?>>500 Millions to 1 Billion</option>
                                    <option value='1000,2000' <?php if ($selectedPopulation == '1000,2000') echo 'SELECTED'?>>1 to 2 Billions</option>
                                </select></label>
                            </div>
                            <!-- options id read via PHP through a JSON file -->
                            <div class='floatingInput'>
                                <label>Language
                                    <select id="language" name='language' id='language'>
                                        <option value='choose' <?php if ($selectedLanguage == 'choose') echo 'SELECTED'?>>Choose one...</option>
                                        <option value='English' <?php if ($selectedLanguage == 'English') echo 'SELECTED'?>>English</option>
                                    </select>
                                </label>
                            </div>
                            <!-- only one letter as the first of a capital name can be entered -->
                            <div class="floatingInput">
                                <label>Capital
                                    <input id="capital" type='text' name='capital' id='capital' value='<?php echo $selectedCapitalLetter ?>'>
                                </label>
                            </div>
                        </fieldset>
                        <input id="submitButton" type='submit' value="My Score">
                        <button type="button" id="rulesButton">Rules</button>
                    </form>

                </div>
