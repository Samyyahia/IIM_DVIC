import firebase from 'firebase'

const config = {
  apiKey: 'AIzaSyAukQChvT00_J7kDMSYUg6FjzUQ52RLk-8',
  authDomain: 'iimxdvci.firebaseapp.com',
  databaseURL: 'https://iimxdvci.firebaseio.com',
  projectId: 'iimxdvci',
  storageBucket: 'iimxdvci.appspot.com',
  messagingSenderId: '956971955574',
  appId: '1:956971955574:web:a58b52fe0a667fe7b3f657',
  measurementId: 'G-GCL3QP9J3L'
}

export const firebaseApp = firebase.initializeApp(config)

// use database() everywhere you want in your application
export const database = firebaseApp.database()

// database ref to get projects from firebase
export const projectsRef = database.ref('projects')
