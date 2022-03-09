import React, { useState } from 'react';

function UserWebsiteList() {
    const websiteData = [
        'https://helenabraham.example.com', 
        'https://rashid.example.com', 
        'https://www.google.com'
    ]

    const [ userWebsites, updateUserWebsites ] = useState(websiteData);

    const removeItem = (e) => {
        const name = e.target.getAttribute("name")
        updateUserWebsites(userWebsites.filter(item => item !== name));
    };

    return (
        <ul>
            <h1>User Websites</h1>

            {userWebsites.map((website, index) => {
                return <li key={`website-${index}`}>{website}
                    <button name={website} type="button" onClick={removeItem}>X</button>
                </li>;
            })}
        </ul>
    );
}

export default UserWebsiteList;
