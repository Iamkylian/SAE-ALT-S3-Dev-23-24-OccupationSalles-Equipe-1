import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";

export function raycastMouse(scene,camera){
    // Set up raycaster
    var raycaster = new THREE.Raycaster();
    var mouse = new THREE.Vector2();

    window.addEventListener('mousemove', function (event) {
        // Calculate normalized device coordinates (NDC) from mouse position
        mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
        mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

        // Update raycaster
        raycaster.setFromCamera(mouse, camera);

        // Check for intersections
        var intersects = raycaster.intersectObjects(scene.children[0]);
        console.log(intersects);

        if (intersects.length > 0) {
            console.log("Mouse intersects with object:", intersects[0].object);
        }
    });
};