/**
 * Master Tiles - 3D Animations
 * Contains Three.js animations and 3D effects
 */

document.addEventListener('DOMContentLoaded', function() {
    // Background animation
    initBackgroundAnimation();
    
    // 3D product showcases
    init3DProductShowcase();
});

/**
 * Initialize the background animation with Three.js
 */
function initBackgroundAnimation() {
    const bgContainer = document.getElementById('bg-animation');
    
    if (!bgContainer) return;
    
    // Create scene, camera, and renderer
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
    
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setPixelRatio(window.devicePixelRatio);
    bgContainer.appendChild(renderer.domElement);
    
    // Create particles
    const particlesGeometry = new THREE.BufferGeometry();
    const particlesCount = 1500;
    
    const posArray = new Float32Array(particlesCount * 3);
    const scaleArray = new Float32Array(particlesCount);
    
    for (let i = 0; i < particlesCount * 3; i += 3) {
        // Position
        posArray[i] = (Math.random() - 0.5) * 15;
        posArray[i + 1] = (Math.random() - 0.5) * 15;
        posArray[i + 2] = (Math.random() - 0.5) * 10;
        
        // Scale
        scaleArray[i / 3] = Math.random();
    }
    
    particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
    particlesGeometry.setAttribute('scale', new THREE.BufferAttribute(scaleArray, 1));
    
    // Material
    const particlesMaterial = new THREE.PointsMaterial({
        size: 0.05,
        color: 0xe74c3c,
        transparent: true,
        opacity: 0.8,
        blending: THREE.AdditiveBlending
    });
    
    // Create points
    const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
    scene.add(particlesMesh);
    
    // Position camera
    camera.position.z = 5;
    
    // Mouse movement effect
    let mouseX = 0;
    let mouseY = 0;
    
    document.addEventListener('mousemove', (event) => {
        mouseX = (event.clientX / window.innerWidth) * 2 - 1;
        mouseY = -(event.clientY / window.innerHeight) * 2 + 1;
    });
    
    // Animation loop
    const animate = () => {
        requestAnimationFrame(animate);
        
        // Rotate particles
        particlesMesh.rotation.x += 0.001;
        particlesMesh.rotation.y += 0.001;
        
        // Follow mouse
        particlesMesh.rotation.x += mouseY * 0.001;
        particlesMesh.rotation.y += mouseX * 0.001;
        
        renderer.render(scene, camera);
    };
    
    animate();
    
    // Handle window resize
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });
}

/**
 * Initialize 3D product showcases
 */
function init3DProductShowcase() {
    const showcaseContainers = [
        document.getElementById('product3d-1'),
        document.getElementById('product3d-2'),
        document.getElementById('product3d-3')
    ];
    
    // Colors for each product
    const colors = [0xe74c3c, 0x3498db, 0x2ecc71];
    
    showcaseContainers.forEach((container, index) => {
        if (!container) return;
        
        // Create scene, camera, and renderer
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);
        
        // Create a tile geometry
        const geometry = new THREE.BoxGeometry(2, 0.2, 2);
        
        // Create materials for different sides of the tile
        const materials = [
            new THREE.MeshStandardMaterial({ color: colors[index], roughness: 0.3, metalness: 0.7 }),
            new THREE.MeshStandardMaterial({ color: colors[index], roughness: 0.3, metalness: 0.7 }),
            new THREE.MeshStandardMaterial({ color: 0xffffff, roughness: 0.3, metalness: 0.7 }),
            new THREE.MeshStandardMaterial({ color: 0xcccccc, roughness: 0.5, metalness: 0.5 }),
            new THREE.MeshStandardMaterial({ color: colors[index], roughness: 0.3, metalness: 0.7 }),
            new THREE.MeshStandardMaterial({ color: 0xcccccc, roughness: 0.5, metalness: 0.5 })
        ];
        
        // Create mesh
        const tile = new THREE.Mesh(geometry, materials);
        scene.add(tile);
        
        // Add lights
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
        scene.add(ambientLight);
        
        const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);
        
        const pointLight = new THREE.PointLight(0xffffff, 1);
        pointLight.position.set(-5, 5, 5);
        scene.add(pointLight);
        
        // Position camera
        camera.position.z = 3;
        
        // Animation loop
        const animate = () => {
            requestAnimationFrame(animate);
            
            // Rotate tile
            tile.rotation.y += 0.01;
            
            renderer.render(scene, camera);
        };
        
        animate();
        
        // Handle container hover
        container.addEventListener('mouseenter', () => {
            gsap.to(tile.rotation, {
                x: 0.5,
                duration: 1,
                ease: 'power2.out'
            });
        });
        
        container.addEventListener('mouseleave', () => {
            gsap.to(tile.rotation, {
                x: 0,
                duration: 1,
                ease: 'power2.out'
            });
        });
        
        // Handle window resize
        window.addEventListener('resize', () => {
            renderer.setSize(container.clientWidth, container.clientHeight);
            camera.aspect = container.clientWidth / container.clientHeight;
            camera.updateProjectionMatrix();
        });
    });
}
