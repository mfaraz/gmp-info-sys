<div class="section2 app-search">
    <h1>Population Statistics Search :</h1>
    <form action="" method="get" name="">
        <div class="form-sect-1">
            <select style="width:110px;" class="roundList">
                <option value="">City [නගරය]</option>
                <option>Gampola</option>
            </select>

            <select name="division" id="cmbDivision" style="width:158px;" class="roundList" onchange="getRegion(this.value)">
                <option value="">Division [කොට්ඨාශය]</option>
                <option value="1">Uda Palatha</option>
                <option value="2">Doluwa</option>
            </select>

            <select name="zone" style="width:136px;" class="roundList" id="cmbRegion">
                <option value="">Region [කලාපය]</option>
            </select>
            <div id="setregion" style="display: none;"></div>

            <select name="branch" style="width:126px;" class="roundList" id="cmbBranch">
                <option value="">Branch [ශාඛාව]</option>
            </select>
            <div id="setbranch" style="display: none;"></div>
            <input name="search" type="button" value="Search" class="s-btn1" style="float:left;" onclick="getSearchResult();" />
        </div>
    </form>
</div>