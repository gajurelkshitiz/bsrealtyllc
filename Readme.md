Project: BS Realty  Mortgage Services

Exported on: 2024-09-22 23:51

Generated Using BootstrapMade Builder


# BS Realty & Mortgage Services — Local Setup

This is a static website project (HTML, CSS, JS, SCSS). The repository is ready to be served as static files. This README explains prerequisites, how to run a local server, how to compile SCSS (if you want to edit styles), and optional Node-based dev scripts.

**Prerequisites**
- **Git / Files**: You should have the project files locally (you already do).
- **Node.js (optional)**: Recommended for using `npm` tools and installing `sass` or `live-server`. Install Node.js LTS.
- **Python 3 (optional)**: Any modern Python 3 can serve files quickly (no install required if already present).
- **VS Code Live Server (optional)**: Useful quick option if you use VS Code.

**Quick: Serve with Python (no install of node required)**
- From WSL / Linux (recommended given repo path):
```bash
# open project root then run:
cd /home/kshitizgajurel/Website-bs-realty-mortgage-services
python3 -m http.server 8000 --bind 0.0.0.0
```
- From Windows PowerShell (if using Windows Python):
```powershell
cd C:\path\to\Website-bs-realty-mortgage-services
python -m http.server 8000
```
- Then open http://localhost:8000 in your browser. The default served file is `index.html`.

**Quick: Serve with Node (npx) — no global installs required**
- Using `serve` (simple static server):
```bash
cd /home/kshitizgajurel/Website-bs-realty-mortgage-services
npx serve . -p 5000
```
- Using `live-server` (auto reload):
```bash
cd /home/kshitizgajurel/Website-bs-realty-mortgage-services
npx live-server --port=3000
```

**VS Code: Live Server extension**
- Open the project folder in VS Code and click *Go Live* (requires the Live Server extension). It serves the folder and auto-reloads on file changes.

**SCSS — compile to CSS (only if you edit SCSS files)**
The project already contains compiled CSS at `assets/css/main.css`. Only do this if you modify SCSS and need to recompile.

- Install Dart Sass (recommended):
```bash
# global install (optional)
npm install -g sass

# or as a dev dependency in the project
npm init -y
npm install --save-dev sass
```
- Compile a single file:
```bash
sass assets/scss/main.scss assets/css/main.css
```
- Watch for changes (recommended during development):
```bash
sass --watch assets/scss:assets/css
```

**Optional: Add `package.json` scripts for convenience**
- Create `package.json` and install dev tools:
```bash
cd /home/kshitizgajurel/Website-bs-realty-mortgage-services
npm init -y
npm install --save-dev live-server sass
```
- Add scripts (edit `package.json` -> `scripts`):
```json
"scripts": {
  "start": "live-server --port=3000",
  "sass": "sass --watch assets/scss:assets/css"
}
```
- Run scripts in separate terminals:
```bash
npm run sass    # compiles/watches SCSS
npm run start   # starts live-server
```

**Common tasks**
- Open project in a browser: http://localhost:8000 (Python) or http://localhost:3000 (live-server example).
- Edit HTML: files are in the project root (e.g., `index.html`, `about.html`).
- Edit SCSS: change files under `assets/scss` and run the `sass --watch` command to regenerate `assets/css/main.css`.

**Troubleshooting**
- If the page shows a blank screen or broken styles, ensure `assets/css/main.css` exists. If not, re-run the `sass` compile step.
- If port is already in use, change the port (e.g., `8001`, `3001`) in the commands.
- If `npx` fails, install Node.js (LTS) and retry.

**Notes & Recommendations**
- This is a static site — any static host (GitHub Pages, Netlify, Vercel) will host it without changes.
- If you plan active style development, use the `sass --watch` workflow and `live-server` or VS Code Live Server for auto-reload.

---
If you want, I can also:
- Create a `package.json` with the scripts shown above.
- Run the server for you (if you want terminal commands to copy/paste for your environment).
- Help set up GitHub Pages / Netlify deploy configuration.

Tell me which option you prefer and I will proceed.
