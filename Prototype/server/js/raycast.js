import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";
import { returnCollisionBox } from "./loading.js";

export function raycastMouse(scene,camera){
    // Set up raycaster
    var raycaster = new THREE.Raycaster();
    var mouse = new THREE.Vector2();

    var highlightedObject = null;
    var collisionBox = returnCollisionBox();

    console.log(collisionBox);

    window.addEventListener('mousemove', function (event) {
        // Calculate normalized device coordinates (NDC) from mouse position
        mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
        mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

        // Update raycaster
        raycaster.setFromCamera(mouse, camera);

        // Check for intersections
        var intersects = raycaster.intersectObjects(scene.children);

        console.log(highlightedObject);
        var objectSelectedIndex = collisionBox.findIndex(box => box.boxHelper === highlightedObject);
        if (objectSelectedIndex !== -1) {
            // Check if loadedObject is defined before accessing it
            if (collisionBox[objectSelectedIndex].loadedObject) {
                var meshSelected = collisionBox[objectSelectedIndex].loadedObject;
                meshSelected.children[0].visible = true;
                console.log(meshSelected);
            } else {
                console.log("Loaded object is undefined for the selected box.");
            }
        } else {
            console.log("Object not found in collisionBox array");
        }

        if (highlightedObject) {
            highlightedObject.material.color.set(0xffffff); // Set to white
          }

        if (intersects.length > 0) {
            // Update color of the intersected object to red
            var intersectedObject = intersects[0].object;
            intersectedObject.material.color.set(0xff0000); // Set to red
      
            // Update the currently highlighted object
            highlightedObject = intersectedObject;
          } else {
            // No intersection, set the highlighted object to null
            highlightedObject = null;
          }
    });
};