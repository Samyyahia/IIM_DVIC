import firebase from 'firebase'

const config = {
  apiKey: 'YOUR_API',
  authDomain: 'YOUR_AUTH',
  databaseURL: 'YOUR_URL',
  projectId: 'YOUR_ID',
  storageBucket: 'YOUR_BUCKET',
  messagingSenderId: 'YOUR_ID',
  appId: 'YOUR_ID',
  measurementId: 'YOUR_ID'
}

export const firebaseApp = firebase.initializeApp(config)

// use database() everywhere you want in your application
export const database = firebaseApp.database()

// database ref to get projects from firebase
export const projectsRef = database.ref('projets')
