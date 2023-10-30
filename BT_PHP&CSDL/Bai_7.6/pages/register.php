<form action="./pages/registerProcess.php" name="form1" method="post">
    <h3>Form Dang Ki</h3>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div style="display: flex;">
        <label for="gender">Gender</label>
        <div>
            <div class="form-check form-check-inline">
                <input type="radio" name="gender" id="male" value="male" class="form-check-input " checked>
                <label for="male" class="form-check-label">Male</label>
            </div>


            <div class="form-check form-check-inline">
                <input type="radio" name="gender" id="female" value="female" class="form-check-input">
                <label for="female" class="form-check-label">Female</label>
            </div>
        </div>
    </div>

    <div style="display: flex;">
        <label for="address[]">Address</label>
        <select name="address[]" id="cars" multiple>
            <option value="Ha Noi">Ha Noi</option>
            <option value="TP.HCM">TP.HCM</option>
            <option value="Nghe An">Nghe An</option>
        </select>
    </div>

    <div style="display: flex;">
        <label for="epl[]">Enble Programming Language: </label>
        <div>
            <input type="checkbox" name="epl[]" value="PHP">
            <label for="PHP">PHP</label>
            <input type="checkbox" name="epl[]" value="C#">
            <label for="C#">C#</label>
            <input type="checkbox" name="epl[]" value="Java">
            <label for="Java">Java</label>
            <input type="checkbox" name="epl[]" value="C++">
            <label for="C++">C++</label>
        </div>
    </div>

    <div style="display: flex;">
        <label for="skill">Skill: </label>
        <div>
            <input type="radio" name="skill" value="Nonmal" checked>
            <label for="skill">Nonmal</label><br>
            <input type="radio" name="skill" value="Good">
            <label for="skill">Good</label><br>
            <input type="radio" name="skill" value="Very Good">
            <label for="skill">Very Good</label><br>
            <input type="radio" name="skill" value="Excellent">
            <label for="skill">Excellent</label>
        </div>
    </div>

    <div style="display: flex;">
        <label for="note">Note: </label>
        <textarea name="note" id="" cols="50" rows="4"></textarea>
    </div>

    <div style="display: flex;">
        <label for="ms">Marriage Status: </label>
        <div>
            <input type="checkbox" name="ms" value="ms">
        </div>
    </div>

    <div>
        <input type="reset" value="Reset" class="btn-primary btn btn-block" name="btn-reset">
        <input type="submit" value="Register" class="btn-primary btn btn-block" name="btn-reg">
    </div>
</form>