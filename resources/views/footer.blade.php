<style>
    h3 {
        margin: 0;
        padding: 0;
        font-size: 1.4em;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 28px 0 0 12px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    li {
        font-size: 1em;
    }

    li a {
        color: black;
        font-size: 1.1em;
        text-decoration: none;
    }
</style>

<footer style="
    width: 100%;
    min-height: 360px;
    display: grid;
    grid-template-columns: 2fr 3fr;
    background-color: #FFF;
    ">
    <div style="
        padding: 64px 0 0 4em; 
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        ">
        <div>
            <div style="font-size: 1.6em; font-weight: 800;">
                <span style="color: #043D74;">Journey</span><span style="color: #D6AB00;">Go</span>
            </div>
            <p style="margin-top: 32px; font-weight: 600; font-size: 1.2em;">Find Us Here</p>
            <ul style="margin: 0";>
                <li>Main Branch - Jalan Satok Kuching</li>
                <li>Airport Branch - Kuching International Airport</li>
                <li>Waterfront Branch - Kuching Waterfront</li>
            </ul>        
        </div>
        <div style="margin-bottom: 24px; font-size: 0.8em;">
            Copyright 2026 JourneyGo Sdn Bhd | Terms & Conditions
        </div>
    </div>
    <div style="
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-end;
        gap: 80px;
        padding-top: 64px;
        padding-right: 4em;
    ">
        <div style="text-align: right;">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/">About Us</a></li>
                <li><a href="/">Promotions</a></li>
                <li><a href="/">FAQs</a></li>
            </ul>
        </div>
        <div style="text-align: right;">
            <h3>Send Us Enquiry</h3>
            <ul>
                <li>{{ $contactInfo->phone }}</li>
                <li>{{ $contactInfo->email }}</li>
            </ul>
        </div>
    </div>
</footer>