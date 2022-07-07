const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"categories.index":{"uri":"dashboard\/categories","methods":["GET","HEAD"]},"categories.create":{"uri":"dashboard\/categories\/create","methods":["GET","HEAD"]},"categories.store":{"uri":"dashboard\/categories","methods":["POST"]},"categories.show":{"uri":"dashboard\/categories\/{category}","methods":["GET","HEAD"]},"categories.edit":{"uri":"dashboard\/categories\/{category}\/edit","methods":["GET","HEAD"]},"categories.update":{"uri":"dashboard\/categories\/{category}","methods":["PUT","PATCH"]},"categories.destroy":{"uri":"dashboard\/categories\/{category}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };
