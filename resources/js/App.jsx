import React from 'react';
import ReactDOM from 'react-dom/client';

function App() {
    return (
        <div>
            <h1>Hello from React inside Laravel!</h1>
        </div>
    );
}

export default App;

if (document.getElementById('app')) {
    const root = ReactDOM.createRoot(document.getElementById('app'));
    root.render(<App />);
}
