import { MeshBVH } from 'https://cdn.jsdelivr.net/npm/three-mesh-bvh@0.7.0/+esm'

export function loadModelsFromDirectory(directory,loader,scene) {
    // Assuming the directory structure is models/salle/fileName.gltf
    // ACCESS MATERIAL : loadedObject.children[0].material
    const modelFiles = [
      'B001', 
      'B002', 
      'B003', 
      'B004', 
      'B005', 
      'B006', 
      'B007', 
      'B008', 
      'B009', 
      'B010', 
      'Corridor_1', 
      'Corridor_2', 
      'Mur_1', 
      'Piece_vide', 
      'Refectoire', 
      'Stairs', 
      'Toilettes_1', 
      'Toilettes_2', 
    ];
  
    // Iterate through the model files and load them
    modelFiles.forEach((fileName) => {
      const filePath = `${directory}/${fileName}.gltf`;
      loader.load(
        filePath,
        function (gltf) {
          // If the file is loaded, add it to the scene
          const loadedObject = gltf.scene;
          console.log(loadedObject.children[0]);
          scene.add(loadedObject);

          loadedObject.boundsTree = new MeshBVH(loadedObject);
        },
        function (xhr) {
          // While it is loading, log the progress
          console.log(`${fileName}: ${(xhr.loaded / xhr.total * 100).toFixed(2)}% loaded`);
        },
        function (error) {
          // If there is an error, log it
          console.error(`Error loading ${fileName}:`, error);
        }
      );
    });
  }
