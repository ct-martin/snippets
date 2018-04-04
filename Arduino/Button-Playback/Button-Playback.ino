/*
  Project 1 - Christian Martin

 For the first 5 seconds record the input of the button,
 then play it back in a loop. During playback the speed
 can bechanged using the dial.

 */

// Constands
const int speedPin = A0;
const int buttonPin = 2;
const int playbackPin = 4;
const int timerPins[] = {8,9,10,11,12}; // 1 pin = 1 second
const int sampleRate = 10; // Per second

bool samples[sampleRate*sizeof(timerPins)];
bool recording = true;
int samplesIndex = 0;

void setup() {
  pinMode(buttonPin, INPUT);
  pinMode(playbackPin, OUTPUT);
  for(int i = 0; i < sizeof(timerPins); i++) {
    pinMode(timerPins[i], OUTPUT);
    digitalWrite(timerPins[i], HIGH);
  }
  
  // initialize serial communications at 9600 bps:
  Serial.begin(9600);
  Serial.println("Recording...");
}

void loop() {
  if(recording) {
    samples[samplesIndex] = digitalRead(buttonPin);
    digitalWrite(playbackPin, samples[samplesIndex]);
    samplesIndex++;
    if(samplesIndex % sampleRate == 0) {
      Serial.println((sizeof(timerPins) / sizeof(int)) - (samplesIndex / sampleRate));
      digitalWrite(timerPins[(sizeof(timerPins) / sizeof(int)) - (samplesIndex / sampleRate)], LOW);
      if(samplesIndex == sizeof(samples) / sizeof(int)) {
        recording = false;
        samplesIndex = 0;
        Serial.println("Beginning playback...");
        digitalWrite(playbackPin, LOW);
      }
    }
    delay(1000 / sampleRate);
  } else {
    digitalWrite(playbackPin, samples[samplesIndex]);
    delay(1000/map(analogRead(speedPin), 500, 1024, sampleRate*0.5, sampleRate*1.5));
    samplesIndex++;
    if(samplesIndex == sizeof(samples) / sizeof(int)) {
      samplesIndex = 0;
    }
  }
}
