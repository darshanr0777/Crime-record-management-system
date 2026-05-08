# 🎬 CineMatch AI
### AI-Powered Movie Recommendation System

![Python](https://img.shields.io/badge/Python-3.10-blue)
![React](https://img.shields.io/badge/React-Frontend-61DAFB)
![FastAPI](https://img.shields.io/badge/FastAPI-Backend-green)
![Machine Learning](https://img.shields.io/badge/ML-Recommendation-orange)
![License](https://img.shields.io/badge/License-MIT-yellow)

---

# 🌟 Project Overview

CineMatch AI is a full-stack AI-powered movie recommendation web application that helps users discover movies similar to the ones they already enjoy.

The system uses Machine Learning techniques such as:

- TF-IDF Vectorization
- Content-Based Filtering
- Cosine Similarity

to generate intelligent movie recommendations based on movie genres and plot overviews.

The application also displays trending movies based on user ratings and provides a modern cinematic user interface using React and FastAPI.

---

# 🚀 Features

- 🎬 AI-Based Movie Recommendations
- 🔥 Trending Movies Section
- 🔍 Smart Movie Search
- 📄 Detailed Movie Information
- 🎨 Glassmorphism UI Design
- ⚡ Fast API Performance
- 📱 Responsive Design
- 🌐 Full Stack Architecture

---

# 📸 Screenshots

## 🏠 Homepage
![Homepage](./screenshots/homepage.png)

---

## 🔍 Search Functionality
![Search](./screenshots/search.png)

---

## 🎬 Recommendation Results
![Recommendations](./screenshots/recommendation.png)

---

## 📱 Mobile Responsive View
![Mobile](./screenshots/mobile.png)

---

# 🏗️ System Architecture

```text
React Frontend
       ↓
FastAPI Backend
       ↓
ML Recommendation Engine
       ↓
Movie Dataset (movies.csv)
```

---

# 🧠 Machine Learning Workflow

1. User enters a movie name
2. Frontend sends request to FastAPI backend
3. Backend processes movie data
4. TF-IDF vectorization converts text into vectors
5. Cosine similarity calculates movie similarity
6. Top similar movies are returned
7. Frontend displays recommendations

---

# 🧠 Recommendation Engine

The recommendation engine is based on **Content-Based Filtering**.

## 📌 Data Processing

Movie data is loaded from:

```bash
movies.csv
```

Important features used:
- Genres
- Plot Overview

These features are combined into a single feature string.

---

## 📌 TF-IDF Vectorization

The project uses:

```python
TfidfVectorizer
```

from Scikit-Learn to convert movie descriptions into numerical vectors.

Benefits:
- Removes common stop words
- Identifies important keywords
- Creates meaningful vector representations

---

## 📌 Cosine Similarity

Movie similarity is calculated using cosine similarity:

\[
\cos(\theta) = \frac{A \cdot B}{||A|| ||B||}
\]

Movies with similar genres and story themes receive higher similarity scores.

---

# ⚙️ Backend Architecture (FastAPI)

The backend acts as a bridge between the Machine Learning engine and the frontend.

## 🛠 Backend Tech Stack

- Python
- FastAPI
- Pandas
- NumPy
- Scikit-Learn
- Uvicorn

---

# 📡 API Endpoints

## 🔥 Trending Movies

```http
GET /api/trending
```

Returns top trending movies.

---

## 🎬 Recommendations

```http
GET /api/recommend?movie_name=Inception
```

Returns:
- Selected movie details
- Similar movie recommendations

---

## 🎭 Genres

```http
GET /api/genres
```

Returns all movie genres.

---

## 📚 Movies

```http
GET /api/movies
```

Returns movie lists.

---

# 💻 Frontend Architecture (React + Vite)

The frontend is developed using React and Vite for high performance and faster development.

## 🛠 Frontend Tech Stack

- React.js
- Vite
- Axios
- CSS3
- JavaScript (ES6+)

---

# 🎨 User Interface Features

## 🏠 Homepage

- Trending movie grid
- Dynamic content loading

---

## 🔍 Search System

Users can:
- Search movies instantly
- Get AI recommendations
- View loading animations
- Receive error messages

---

## 📄 Detailed Movie View

Displays:
- Movie Poster
- Title
- Rating
- Genres
- Overview
- Similar recommendations

---

## ✨ Glassmorphism UI

Modern UI effects include:
- Frosted glass design
- Transparent cards
- Cinematic visual appearance

---

# 📘 Project Management Concept Implementation

CineMatch AI is developed by applying important Project Management concepts including planning, risk management, testing, maintenance, and globalization.

---

# 1️⃣ Introduction to Project Management

## ✅ Project Objective

The primary objective of CineMatch AI is to provide intelligent movie recommendations using Machine Learning techniques based on user preferences, genres, and movie similarity analysis.

---

## 👥 Stakeholders

The stakeholders involved in the project include:

- Users searching for movie recommendations
- Frontend Developers
- Backend Developers
- Machine Learning Engineers
- System Administrators

---

## 🔄 Project Life Cycle Used

The project follows the Software Development Life Cycle (SDLC):

1. Requirement Analysis
2. Project Planning
3. UI/UX Design
4. Backend Development
5. Machine Learning Integration
6. Testing
7. Deployment
8. Maintenance

---

## 📋 Project Planning

The project was divided into independent modules:

- Frontend Development using React + Vite
- Backend API Development using FastAPI
- Recommendation Engine Development
- Database and Dataset Handling
- Testing and Deployment

---

## ⚡ Modern Project Management Practices

- Agile-based incremental development
- GitHub version control
- Modular architecture
- Continuous feature enhancement

---

# 2️⃣ Risk Management

## ✅ Risks Identified in CineMatch AI

| Risk | Impact | Mitigation |
|---|---|---|
| Incorrect movie recommendations | Poor user experience | Improve similarity algorithms |
| API response failure | Application crash | Exception handling |
| Slow recommendation processing | Increased response time | TF-IDF optimization |
| Dataset inconsistency | Wrong predictions | Data preprocessing |
| Invalid user input | Backend errors | Input validation |
| Server overload | Downtime | Efficient API management |

---

## 🔄 Risk Management Cycle

### 🔹 Risk Identification
Potential technical and operational risks were identified during planning.

### 🔹 Risk Analysis
Risks analyzed based on:
- Severity
- Probability
- User impact

### 🔹 Risk Mitigation
Implemented:
- API validation
- Error handling
- Optimized ML processing

### 🔹 Risk Monitoring
API logs and system performance are monitored continuously.

---

# 3️⃣ Software Requirements Gathering

## ✅ Functional Requirements

The system should:
- Search movies
- Recommend similar movies
- Display trending movies
- Show movie details
- Filter by genres
- Handle invalid searches

---

## ✅ Non-Functional Requirements

The system should:
- Be fast and responsive
- Support multiple devices
- Ensure secure API communication
- Handle large datasets efficiently

---

## 📌 Requirement Gathering Techniques

- User behavior analysis
- Competitor research
- Streaming platform analysis
- Feedback-based planning

---

# ⏱ Project Estimation

| Task | Estimated Time |
|---|---|
| Frontend UI Design | 4 Days |
| Backend API Development | 5 Days |
| ML Model Integration | 7 Days |
| Testing | 4 Days |
| Deployment | 2 Days |

---

# 4️⃣ Testing Phase Implementation

## ✅ Testing Activities

### 🔹 Unit Testing
Tested:
- Recommendation engine
- Search functionality
- API endpoints

---

### 🔹 Integration Testing
Tested communication between:
- React frontend
- FastAPI backend
- ML engine

---

### 🔹 System Testing

Workflow tested:
1. User searches movie
2. Backend processes request
3. ML model generates recommendations
4. Frontend displays results

---

### 🔹 User Acceptance Testing
System tested for:
- Recommendation quality
- User experience
- UI responsiveness

---

### 🔹 Performance Testing

Checked:
- API speed
- Dataset loading
- Recommendation response time

---

# 📋 Example Test Cases

| Test Case | Expected Result |
|---|---|
| Search “Inception” | Similar movies displayed |
| Invalid movie search | Error message shown |
| Homepage load | Trending movies displayed |
| API request | JSON response returned |

---

# 5️⃣ Maintenance Phase Implementation

## ✅ Maintenance Activities

### 🔧 Bug Fixing
- Frontend issue resolution
- Backend API fixes

### 🔄 Dataset Maintenance
Movie datasets can be updated regularly.

### 🚀 Future Feature Enhancements
- User Authentication
- Watchlists
- Hybrid Recommendation System
- Personalized Dashboard

### 🔐 Security Maintenance
- API validation
- Input sanitization
- CORS security configuration

---

# 6️⃣ Globalization and Internet Impact

## ✅ Internet-Based Architecture

CineMatch AI works as a cloud-ready internet application where:
- Frontend communicates with backend APIs online
- Recommendations are dynamically generated
- Users can access globally

---

## 🌍 Global Collaboration

Development tools used:
- GitHub
- Git Version Control
- Remote workflows
- Online deployment platforms

---

## 🌐 Cross-Platform Accessibility

Supports:
- Desktop
- Mobile
- Tablets

through responsive UI design.

---

## ⚡ Continuous Availability

The application can be deployed on:
- Vercel
- Render
- Netlify

for 24/7 accessibility.

---

# 7️⃣ Agile and Modern Software Practices

## ✅ Agile Development

Development was completed incrementally:
- Frontend module
- Backend module
- ML recommendation engine
- Testing module

---

## ✅ Version Control

GitHub used for:
- Source code management
- Collaboration
- Version tracking
- Backup management

---

## ✅ Continuous Improvement

The recommendation system can improve using:
- Updated datasets
- User feedback
- Better recommendation algorithms

---

# 📂 Project Structure

```bash
CineMatch-AI/
│
├── backend/
│   ├── main.py
│   ├── recommender.py
│   ├── movies.csv
│   └── requirements.txt
│
├── frontend/
│   ├── src/
│   ├── public/
│   └── package.json
│
├── screenshots/
│   ├── homepage.png
│   ├── search.png
│   ├── recommendation.png
│   └── mobile.png
│
└── README.md
```

---

# 🛠 Run Locally

## Clone the repository

```bash
git clone https://github.com/sunilarlur/CineMatch-AI.git
```

---

## Navigate to the project folder

```bash
cd CineMatch-AI
```

---

# ⚙️ Backend Setup

## Navigate to backend

```bash
cd backend
```

---

## Install dependencies

```bash
pip install -r requirements.txt
```

---

## Run FastAPI server

```bash
uvicorn main:app --reload
```

Backend runs on:

```bash
http://127.0.0.1:8000
```

---

# 💻 Frontend Setup

## Navigate to frontend

```bash
cd frontend
```

---

## Install dependencies

```bash
npm install
```

---

## Start frontend server

```bash
npm run dev
```

Frontend runs on:

```bash
http://localhost:5173
```

---

# 🚀 Future Enhancements

- 🎥 Movie Trailer Integration
- 👤 User Authentication
- ❤️ Watchlists
- 🤝 Collaborative Filtering
- 🌙 Dark Mode
- 🎤 Voice Search
- 📊 Recommendation Analytics

---

# 🌐 Deployment

Frontend Deployment:
- Vercel
- Netlify

Backend Deployment:
- Render
- Railway

---

# 📜 License

This project is licensed under the MIT License.

---

# 👨‍💻 Author

Developed by **Sunil A**

---

# ⭐ Support

If you like this project:

⭐ Star the repository  
🍴 Fork the project  
📢 Share it with others


