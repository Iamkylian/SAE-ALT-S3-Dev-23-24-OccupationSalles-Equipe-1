import { MeshBVH } from "https://cdn.jsdelivr.net/npm/three-mesh-bvh@0.7.0/+esm";
import {
  World,
  Body,
  Box,
  Vec3,
} from "https://cdn.jsdelivr.net/npm/cannon-es@0.20.0/dist/cannon-es.min.js";

const objects = [];

export function loadModelsFromDirectory(directory, loader, scene, camera) {
  // Assuming the directory structure is models/salle/fileName.gltf
  // ACCESS MATERIAL : loadedObject.children[0].material
  const modelFiles = [
    "B001",
    "B002",
    "B003",
    "B004",
    "B005",
    "B006",
    "B007",
    "B008",
    "B009",
    "B010",
    "Corridor_1",
    "Corridor_2",
    "Mur_1",
    "Piece_vide",
    "Refectoire",
    "Stairs",
    "Toilettes_1",
    "Toilettes_2",
  ];

  const world = new World();

  // Tableau pour stocker les objets Three.js et Cannon.js correspondants

  // Iterate through the model files and load them
  modelFiles.forEach((fileName) => {
    const filePath = `${directory}/${fileName}.gltf`;
    loader.load(
      filePath,
      function (gltf) {
        // If the file is loaded, add it to the scene
        const loadedObject = gltf.scene;
        console.log(loadedObject.children[0]);

        const bbox = new THREE.Box3().setFromObject(loadedObject);
        const size = new THREE.Vector3();
        bbox.getSize(size);

        const body = new Body({
          mass: 0,
          shape: new Box(new Vec3(size.x, size.y, size.z)), // Use half of the size
        });

        const boxGeometry = new THREE.BoxGeometry(size.x, size.y, size.z); // Use the full size
        const boxMaterial = new THREE.MeshBasicMaterial({
          color: 0x00ff00,
          wireframe: true,
        });
        const visualBox = new THREE.Mesh(boxGeometry, boxMaterial);

        world.addBody(body);

        scene.add(loadedObject);

        objects.push({ loadedObject, body });
        console.log(objects);
      },
      function (xhr) {
        // While it is loading, log the progress
        console.log(
          `${fileName}: ${((xhr.loaded / xhr.total) * 100).toFixed(2)}% loaded`
        );
      },
      function (error) {
        // If there is an error, log it
        console.error(`Error loading ${fileName}:`, error);
      }
    );
  });
}

import * as THREE from "https://cdn.skypack.dev/three@0.129.0/build/three.module.js";

export function raycastMouse(scene, camera) {
  const raycaster = new THREE.Raycaster();
  const mouse = new THREE.Vector2();

  // Handle mouse move event
  window.addEventListener("mousemove", (event) => {
    // Calculate normalized device coordinates (NDC) from mouse position
    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
    mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;

    // Update raycaster
    raycaster.setFromCamera(mouse, camera);

    // Check for intersections with Cannon.js bodies
    const intersects = raycastCannonBodies(raycaster, objects);

    // Do something with the intersections if needed
    if (intersects.length > 0) {
      console.log(
        "Mouse intersects with Cannon.js body:",
        intersects[0].object
      );
    }

    console.log(intersects);
  });

  // Function to perform raycasting against Cannon.js bodies
  function raycastCannonBodies(raycaster, objects) {
    const intersects = [];
    objects.forEach(({ loadedObject, body }) => {
      const result = raycaster.intersectObject(loadedObject, true);
      if (result.length > 0) {
        intersects.push({ object: body, ...result[0] });
      }
    });
    return intersects;
  }
}
