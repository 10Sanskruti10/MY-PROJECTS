const express = require('express');
const mongoose = require('mongoose');
const session = require('express-session');
const path = require('path');

const userRoutes = require('./routes/userRoutes');
const studentRoutes = require('./routes/studentRoutes');

const app = express();

// MongoDB connection string (update as needed)
const MONGO_URI = 'mongodb://localhost:27017/student_record_management';

// Connect to MongoDB
mongoose.connect(MONGO_URI, {
  useNewUrlParser: true,
  useUnifiedTopology: true
})
.then(() => console.log('Connected to MongoDB...'))
.catch((err) => console.error('MongoDB connection error:', err));

// Set EJS as the view engine
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

// Built-in middleware to parse urlencoded and json body data
app.use(express.urlencoded({ extended: false }));
app.use(express.json());

// Session setup (in-memory store)
app.use(session({
  secret: 'yourSecretKeyChangeMe', // replace with strong secret
  resave: false,
  saveUninitialized: false,
  cookie: {
    maxAge: 1000 * 60 * 60 * 24 // 1 day
  }
}));

// Expose authentification info to views
app.use((req, res, next) => {
  res.locals.isAuthenticated = !!req.session.userId;
  next();
});

// Routes
app.use('/', userRoutes);
app.use('/student', studentRoutes);

// Dashboard route (only accessible when logged in)
app.get('/dashboard', (req, res) => {
  if (!req.session.userId) {
    return res.redirect('/login');
  }
  res.redirect('/student');
});

// Root redirect
app.get('/', (req, res) => {
  if (req.session.userId) {
    return res.redirect('/dashboard');
  }
  res.redirect('/login');
});

// 404 handler
app.use((req, res) => {
  res.status(404).send('404 Not Found');
});

// Start server
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server running on http://localhost:${PORT}`);
});
