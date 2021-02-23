# WebEng20_group5_EventWorld

# ![1)home](https://user-images.githubusercontent.com/73962468/103565082-5ae03180-4ec8-11eb-9055-09d6ef4255f5.png)

# ![mock_all_devices_trans](https://user-images.githubusercontent.com/73081195/104765952-69ed9c00-5772-11eb-85ff-293bd22f4d86.png)

**Team 5**: Ιωάννης Μανώλας, Γιώργος Κύρος, Χρήστος Λάσκος

URL εφαρμογής: 
- http://eventworld.ml/

## Περιγραφή
To EventWorld αποτελεί μια διαδικτυακή εφαρμογή βασισμένη σε PHP και ειδικότερα στο Framework αυτής το Laravel. Μέσω της εφαρμογής οι χρήστες θα μπορούν να ενημερώνονται για επερχόμενα μουσικά events στην περιοχή τους, στην χώρα τους αλλά και στον υπόλοιπο κόσμο. Επιπλέον, αφού οι επισκέπτες δημιουργήσουν λογαριασμό στην ιστοσελίδα, θα μπορούν να αναζητήσουν αλλά και να αποθηκεύσουν events με βάση τις μουσικές προτιμήσεις τους αλλά και τους αγαπημένους τους καλλιτέχνες. Η εφαρμογή θα χρησιμοποιεί εξωτερικά δεδομένα, για λήψη της πληροφορίας των events, από το Songkick API και θα είναι συνδεδεμένη με ξεχωριστή βάση δεδομένων για την εγγραφή, αποθήκευση και επαλήθευση των χρηστών. Τέλος θα υλοποιηθεί και διεπαφή διαχειριστή, για την διευκόλυνση της διαχείρισης των εγγεγραμμένων χρηστών.

## Τεχνικά Χαρακτηριστικά
Για την υλοποίηση των απαιτήσεων της εφαρμογής θα χρησιμοποιηθούν οι εξής τεχνολογίες:
- Βάση δεδομένων: MySQL
- Backend: PHP 7.4.12 | Laravel Framework v8
- Frontend: jQuery, Ajax, Bootstrap

Τεχνολογίες | Περιγραφή
------ | ---------
Databases | MySQL
Configuration and Change Management Tools | GitHub, Google Docs, Microsoft Office
Programing Languages And Frameworks | PHP v7.4, HTML5, CSS, AJAX, JQUERY, JAVASCRIPT, LARAVEL v8, Bootstrap 4
Collaboration And Portal Technologies | Google Docs, GitHub, Skype
Office Tools | Google Docs, Microsoft 360, Adobe CS Photoshop
Operating Systems | Windows 10
Scheme and Diagrams Production | draw.io,sqldbm.com

## Πηγές
- Songkick API
- Leaflet 
- Google Calendar

# ![api_call](https://user-images.githubusercontent.com/73081195/101267816-d2099500-3765-11eb-9ae9-022b96420ec1.jpg)

# ![api_diag](https://user-images.githubusercontent.com/73962468/104775533-23ec0480-5781-11eb-9c18-daa50324b1e3.png)

## Σελίδες Eφαρμογής
Σελίδα | Περιγραφή
------ | ---------
Welcome/Landing | Θα περιέχει εισαγωγή και λίγα ενδεικτικά δεδομένα
Login/Register (User/Admin) | + Λειτουργίες forgot password/email confirmation 
Admin | Προβολή/Επεξεργασία + Διαγραφή χρηστών και τα στοιχεία αυτών
User Profile | Προβολή/Επεξεργασία + Προτιμήσεις
Events Wall | Nearby, Most Popular, Athens/Thessaloniki Events
Artists | Εμφάνιση των επερχόμενων event του Artist
My Preferences | Προβολή των αποθηκευμένων event του χρήστη καθώς και διαγραφή αυτών απο την βάση
About/Contact Us | Φόρμα επικοινωνίας με εμάς
404 | Page not found

## Αρχικές Απαιτήσεις
- [x] Καταγραφή και ανάθεση καθηκόντων στο πρότυπο έγγραφο Excel/Google Sheet
- [x] Εγκατάσταση Laravel
- [x] Δημιουργία βάσης δεδομένων με το phpMyAdmin
- [x] Ανέβασμα σε εξυπηρετητή
- [x] Επιτυχής διασύνδεση με το Songkick API
- [x] Επιτυχής φόρτωση εξωτερικών βιβλιοθηκών (Bootstrap/jQuery)

# ![steps](https://user-images.githubusercontent.com/73962468/104775529-22224100-5781-11eb-94eb-8acd81c736d7.png)

## Σχεδιάγραμμα Βάση Δεδομένων
![database_scheme](https://user-images.githubusercontent.com/73081195/103562447-c542a300-4ec3-11eb-9e91-fa4738275f8e.png)

## Αρχιτεκτονική Συστήματος
![arch_diagramm_evw](https://user-images.githubusercontent.com/73081195/101262381-f1dd9080-3746-11eb-9a71-3a11b8ffd5df.jpg)
